<?php

declare(strict_types=1);

namespace CasParser\Services;

use CasParser\CamsKfintech\UnifiedResponse;
use CasParser\Cdsl\CdslParsePdfParams;
use CasParser\Client;
use CasParser\Core\Contracts\BaseResponse;
use CasParser\Core\Exceptions\APIException;
use CasParser\RequestOptions;
use CasParser\ServiceContracts\CdslRawContract;

/**
 * @phpstan-import-type RequestOpts from \CasParser\RequestOptions
 */
final class CdslRawService implements CdslRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * This endpoint specifically parses CDSL CAS (Consolidated Account Statement) PDF files and returns data in a unified format.
     * Use this endpoint when you know the PDF is from CDSL.
     *
     * @param array{
     *   password?: string, pdfFile?: string, pdfURL?: string
     * }|CdslParsePdfParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UnifiedResponse>
     *
     * @throws APIException
     */
    public function parsePdf(
        array|CdslParsePdfParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CdslParsePdfParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'v4/cdsl/parse',
            body: (object) $parsed,
            options: $options,
            convert: UnifiedResponse::class,
        );
    }
}
