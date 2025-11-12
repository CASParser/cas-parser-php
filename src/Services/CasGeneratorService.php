<?php

declare(strict_types=1);

namespace CasParser\Services;

use CasParser\CasGenerator\CasGeneratorGenerateCasParams;
use CasParser\CasGenerator\CasGeneratorGenerateCasResponse;
use CasParser\Client;
use CasParser\Core\Exceptions\APIException;
use CasParser\RequestOptions;
use CasParser\ServiceContracts\CasGeneratorContract;

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
     * @param array{
     *   email: string,
     *   from_date: string,
     *   password: string,
     *   to_date: string,
     *   cas_authority?: "kfintech"|"cams"|"cdsl"|"nsdl",
     *   pan_no?: string,
     * }|CasGeneratorGenerateCasParams $params
     *
     * @throws APIException
     */
    public function generateCas(
        array|CasGeneratorGenerateCasParams $params,
        ?RequestOptions $requestOptions = null,
    ): CasGeneratorGenerateCasResponse {
        [$parsed, $options] = CasGeneratorGenerateCasParams::parseRequest(
            $params,
            $requestOptions,
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
