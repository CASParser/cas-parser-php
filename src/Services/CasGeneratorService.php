<?php

declare(strict_types=1);

namespace CasParser\Services;

use CasParser\CasGenerator\CasGeneratorGenerateCasParams;
use CasParser\CasGenerator\CasGeneratorGenerateCasParams\CasAuthority;
use CasParser\CasGenerator\CasGeneratorGenerateCasResponse;
use CasParser\Client;
use CasParser\Core\Exceptions\APIException;
use CasParser\Core\Implementation\HasRawResponse;
use CasParser\RequestOptions;
use CasParser\ServiceContracts\CasGeneratorContract;

use const CasParser\Core\OMIT as omit;

final class CasGeneratorService implements CasGeneratorContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * This endpoint generates CAS (Consolidated Account Statement) documents by submitting a mailback request to the specified CAS authority.
     * Currently only supports KFintech, with plans to support CAMS, CDSL, and NSDL in the future.
     *
     * @param string $email Email address to receive the CAS document
     * @param string $fromDate Start date for the CAS period (format YYYY-MM-DD)
     * @param string $password Password to protect the generated CAS PDF
     * @param string $toDate End date for the CAS period (format YYYY-MM-DD)
     * @param CasAuthority|value-of<CasAuthority> $casAuthority CAS authority to generate the document from (currently only kfintech is supported)
     * @param string $panNo PAN number (optional for some CAS authorities)
     *
     * @return CasGeneratorGenerateCasResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function generateCas(
        $email,
        $fromDate,
        $password,
        $toDate,
        $casAuthority = omit,
        $panNo = omit,
        ?RequestOptions $requestOptions = null,
    ): CasGeneratorGenerateCasResponse {
        $params = [
            'email' => $email,
            'fromDate' => $fromDate,
            'password' => $password,
            'toDate' => $toDate,
            'casAuthority' => $casAuthority,
            'panNo' => $panNo,
        ];

        return $this->generateCasRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CasGeneratorGenerateCasResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function generateCasRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CasGeneratorGenerateCasResponse {
        [$parsed, $options] = CasGeneratorGenerateCasParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'v4/generate',
            body: (object) $parsed,
            options: $options,
            convert: CasGeneratorGenerateCasResponse::class,
        );
    }
}
