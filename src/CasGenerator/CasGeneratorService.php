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
     * @param array{
     *   email: string,
     *   fromDate: string,
     *   password: string,
     *   toDate: string,
     *   casAuthority?: CasAuthority::*,
     *   panNo?: string,
     * }|CasGeneratorGenerateCasParams $params
     */
    public function generateCas(
        array|CasGeneratorGenerateCasParams $params,
        ?RequestOptions $requestOptions = null,
    ): CasGeneratorGenerateCasResponse {
        [$parsed, $options] = CasGeneratorGenerateCasParams::parseRequest(
            $params,
            $requestOptions
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
