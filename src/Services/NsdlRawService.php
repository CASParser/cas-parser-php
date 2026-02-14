<?php

declare(strict_types=1);

namespace CasParser\Services;

use CasParser\CamsKfintech\UnifiedResponse;
use CasParser\Client;
use CasParser\Core\Contracts\BaseResponse;
use CasParser\Core\Exceptions\APIException;
use CasParser\Nsdl\NsdlParseParams;
use CasParser\RequestOptions;
use CasParser\ServiceContracts\NsdlRawContract;

/**
 * @phpstan-import-type RequestOpts from \CasParser\RequestOptions
 */
final class NsdlRawService implements NsdlRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * This endpoint specifically parses NSDL CAS (Consolidated Account Statement) PDF files and returns data in a unified format.
     * Use this endpoint when you know the PDF is from NSDL.
     *
     * @param array{
     *   password?: string, pdfFile?: string, pdfURL?: string
     * }|NsdlParseParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UnifiedResponse>
     *
     * @throws APIException
     */
    public function parse(
        array|NsdlParseParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NsdlParseParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'v4/nsdl/parse',
            body: (object) $parsed,
            options: $options,
            convert: UnifiedResponse::class,
        );
    }
}
