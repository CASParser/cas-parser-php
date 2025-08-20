<?php

declare(strict_types=1);

namespace CasParser\CasGenerator;

use CasParser\CasGenerator\CasGeneratorGenerateCasParams\CasAuthority;
use CasParser\Client;
use CasParser\Contracts\CasGeneratorContract;
use CasParser\Core\Conversion;
use CasParser\RequestOptions;
use CasParser\Responses\CasGenerator\CasGeneratorGenerateCasResponse;

final class CasGeneratorService implements CasGeneratorContract
{
    public function __construct(private Client $client) {}

    /**
     * This endpoint generates CAS (Consolidated Account Statement) documents by submitting a mailback request to the specified CAS authority.
     * Currently only supports KFintech, with plans to support CAMS, CDSL, and NSDL in the future.
     *
     * @param string $email Email address to receive the CAS document
     * @param string $fromDate Start date for the CAS period (format YYYY-MM-DD)
     * @param string $password Password to protect the generated CAS PDF
     * @param string $toDate End date for the CAS period (format YYYY-MM-DD)
     * @param CasAuthority::* $casAuthority CAS authority to generate the document from (currently only kfintech is supported)
     * @param string $panNo PAN number (optional for some CAS authorities)
     */
    public function generateCas(
        $email,
        $fromDate,
        $password,
        $toDate,
        $casAuthority = null,
        $panNo = null,
        ?RequestOptions $requestOptions = null,
    ): CasGeneratorGenerateCasResponse {
        [$parsed, $options] = CasGeneratorGenerateCasParams::parseRequest(
            [
                'email' => $email,
                'fromDate' => $fromDate,
                'password' => $password,
                'toDate' => $toDate,
                'casAuthority' => $casAuthority,
                'panNo' => $panNo,
            ],
            $requestOptions,
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'v4/generate',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(
            CasGeneratorGenerateCasResponse::class,
            value: $resp
        );
    }
}
