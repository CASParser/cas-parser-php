<?php

declare(strict_types=1);

namespace CasParser\Services;

use CasParser\CamsKfintech\CamsKfintechParseParams;
use CasParser\CamsKfintech\UnifiedResponse;
use CasParser\Client;
use CasParser\Core\Contracts\BaseResponse;
use CasParser\Core\Exceptions\APIException;
use CasParser\RequestOptions;
use CasParser\ServiceContracts\CamsKfintechRawContract;

/**
 * @phpstan-import-type RequestOpts from \CasParser\RequestOptions
 */
final class CamsKfintechRawService implements CamsKfintechRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * This endpoint specifically parses CAMS/KFintech CAS (Consolidated Account Statement) PDF files and returns data in a unified format.
     * Use this endpoint when you know the PDF is from CAMS or KFintech.
     *
     * @param array{
     *   password?: string, pdfFile?: string, pdfURL?: string
     * }|CamsKfintechParseParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UnifiedResponse>
     *
     * @throws APIException
     */
    public function parse(
        array|CamsKfintechParseParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CamsKfintechParseParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'v4/cams_kfintech/parse',
            body: (object) $parsed,
            options: $options,
            convert: UnifiedResponse::class,
        );
    }
}
