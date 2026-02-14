<?php

declare(strict_types=1);

namespace CasParser\Services;

use CasParser\CamsKfintech\UnifiedResponse;
use CasParser\Client;
use CasParser\Core\Contracts\BaseResponse;
use CasParser\Core\Exceptions\APIException;
use CasParser\RequestOptions;
use CasParser\ServiceContracts\SmartRawContract;
use CasParser\Smart\SmartParseCasPdfParams;

/**
 * @phpstan-import-type RequestOpts from \CasParser\RequestOptions
 */
final class SmartRawService implements SmartRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * This endpoint parses CAS (Consolidated Account Statement) PDF files from NSDL, CDSL, or CAMS/KFintech and returns data in a unified format.
     * It auto-detects the CAS type and transforms the data into a consistent structure regardless of the source.
     *
     * @param array{
     *   password?: string, pdfFile?: string, pdfURL?: string
     * }|SmartParseCasPdfParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UnifiedResponse>
     *
     * @throws APIException
     */
    public function parseCasPdf(
        array|SmartParseCasPdfParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SmartParseCasPdfParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'v4/smart/parse',
            body: (object) $parsed,
            options: $options,
            convert: UnifiedResponse::class,
        );
    }
}
