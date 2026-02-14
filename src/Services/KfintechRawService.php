<?php

declare(strict_types=1);

namespace CasParser\Services;

use CasParser\Client;
use CasParser\Core\Contracts\BaseResponse;
use CasParser\Core\Exceptions\APIException;
use CasParser\Kfintech\KfintechGenerateCasParams;
use CasParser\Kfintech\KfintechGenerateCasResponse;
use CasParser\RequestOptions;
use CasParser\ServiceContracts\KfintechRawContract;

/**
 * @phpstan-import-type RequestOpts from \CasParser\RequestOptions
 */
final class KfintechRawService implements KfintechRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Generate CAS via KFintech mailback. The CAS PDF will be sent to the investor's email.
     *
     * This is an async operation - the investor receives the CAS via email within a few minutes.
     * For instant CAS retrieval, use CDSL Fetch (`/v4/cdsl/fetch`).
     *
     * @param array{
     *   email: string,
     *   fromDate: string,
     *   password: string,
     *   toDate: string,
     *   panNo?: string,
     * }|KfintechGenerateCasParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<KfintechGenerateCasResponse>
     *
     * @throws APIException
     */
    public function generateCas(
        array|KfintechGenerateCasParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = KfintechGenerateCasParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'v4/kfintech/generate',
            body: (object) $parsed,
            options: $options,
            convert: KfintechGenerateCasResponse::class,
        );
    }
}
