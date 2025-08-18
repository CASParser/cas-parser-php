<?php

declare(strict_types=1);

namespace CasParser\CasParser;

use CasParser\Client;
use CasParser\Contracts\CasParserContract;
use CasParser\Core\Conversion;
use CasParser\RequestOptions;

final class CasParserService implements CasParserContract
{
    public function __construct(private Client $client) {}

    /**
     * This endpoint specifically parses CAMS/KFintech CAS (Consolidated Account Statement) PDF files and returns data in a unified format.
     * Use this endpoint when you know the PDF is from CAMS or KFintech.
     *
     * @param array{
     *   password?: string, pdfFile?: string, pdfURL?: string
     * }|CasParserCamsKfintechParams $params
     */
    public function camsKfintech(
        array|CasParserCamsKfintechParams $params,
        ?RequestOptions $requestOptions = null,
    ): UnifiedResponse {
        [$parsed, $options] = CasParserCamsKfintechParams::parseRequest(
            $params,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'v4/cams_kfintech/parse',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(UnifiedResponse::class, value: $resp);
    }

    /**
     * This endpoint specifically parses CDSL CAS (Consolidated Account Statement) PDF files and returns data in a unified format.
     * Use this endpoint when you know the PDF is from CDSL.
     *
     * @param array{
     *   password?: string, pdfFile?: string, pdfURL?: string
     * }|CasParserCdslParams $params
     */
    public function cdsl(
        array|CasParserCdslParams $params,
        ?RequestOptions $requestOptions = null
    ): UnifiedResponse {
        [$parsed, $options] = CasParserCdslParams::parseRequest(
            $params,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'v4/cdsl/parse',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(UnifiedResponse::class, value: $resp);
    }

    /**
     * This endpoint specifically parses NSDL CAS (Consolidated Account Statement) PDF files and returns data in a unified format.
     * Use this endpoint when you know the PDF is from NSDL.
     *
     * @param array{
     *   password?: string, pdfFile?: string, pdfURL?: string
     * }|CasParserNsdlParams $params
     */
    public function nsdl(
        array|CasParserNsdlParams $params,
        ?RequestOptions $requestOptions = null
    ): UnifiedResponse {
        [$parsed, $options] = CasParserNsdlParams::parseRequest(
            $params,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'v4/nsdl/parse',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(UnifiedResponse::class, value: $resp);
    }

    /**
     * This endpoint parses CAS (Consolidated Account Statement) PDF files from NSDL, CDSL, or CAMS/KFintech and returns data in a unified format.
     * It auto-detects the CAS type and transforms the data into a consistent structure regardless of the source.
     *
     * @param array{
     *   password?: string, pdfFile?: string, pdfURL?: string
     * }|CasParserSmartParseParams $params
     */
    public function smartParse(
        array|CasParserSmartParseParams $params,
        ?RequestOptions $requestOptions = null,
    ): UnifiedResponse {
        [$parsed, $options] = CasParserSmartParseParams::parseRequest(
            $params,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'v4/smart/parse',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(UnifiedResponse::class, value: $resp);
    }
}
