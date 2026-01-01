<?php

declare(strict_types=1);

namespace CasParser\Services;

use CasParser\CasGenerator\CasGeneratorGenerateCasParams;
use CasParser\CasGenerator\CasGeneratorGenerateCasParams\CasAuthority;
use CasParser\CasGenerator\CasGeneratorGenerateCasResponse;
use CasParser\Client;
use CasParser\Core\Contracts\BaseResponse;
use CasParser\Core\Exceptions\APIException;
use CasParser\RequestOptions;
use CasParser\ServiceContracts\CasGeneratorRawContract;

final class CasGeneratorRawService implements CasGeneratorRawContract
{
    // @phpstan-ignore-next-line
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
     *   fromDate: string,
     *   password: string,
     *   toDate: string,
     *   casAuthority?: 'kfintech'|'cams'|'cdsl'|'nsdl'|CasAuthority,
     *   panNo?: string,
     * }|CasGeneratorGenerateCasParams $params
     *
     * @return BaseResponse<CasGeneratorGenerateCasResponse>
     *
     * @throws APIException
     */
    public function generateCas(
        array|CasGeneratorGenerateCasParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CasGeneratorGenerateCasParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'v4/generate',
            body: (object) $parsed,
            options: $options,
            convert: CasGeneratorGenerateCasResponse::class,
        );
    }
}
