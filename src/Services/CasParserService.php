<?php

declare(strict_types=1);

namespace CasParser\Services;

use CasParser\CasParser\CasParserCamsKfintechParams;
use CasParser\CasParser\CasParserCdslParams;
use CasParser\CasParser\CasParserNsdlParams;
use CasParser\CasParser\CasParserSmartParseParams;
use CasParser\CasParser\UnifiedResponse;
use CasParser\Client;
use CasParser\Contracts\CasParserContract;
use CasParser\Core\Conversion;
use CasParser\Core\Util;
use CasParser\RequestOptions;

final class CasParserService implements CasParserContract
{
    public function __construct(private Client $client) {}

    /**
     * This endpoint specifically parses CAMS/KFintech CAS (Consolidated Account Statement) PDF files and returns data in a unified format.
     * Use this endpoint when you know the PDF is from CAMS or KFintech.
     *
     * @param string $password Password for the PDF file (if required)
     * @param string $pdfFile Base64 encoded CAS PDF file
     * @param string $pdfURL URL to the CAS PDF file
     */
    public function camsKfintech(
        $password = null,
        $pdfFile = null,
        $pdfURL = null,
        ?RequestOptions $requestOptions = null,
    ): UnifiedResponse {
        $args = [
            'password' => $password, 'pdfFile' => $pdfFile, 'pdfURL' => $pdfURL,
        ];
        $args = Util::array_filter_null($args, ['password', 'pdfFile', 'pdfURL']);
        [$parsed, $options] = CasParserCamsKfintechParams::parseRequest(
            $args,
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
     * @param string $password Password for the PDF file (if required)
     * @param string $pdfFile Base64 encoded CAS PDF file
     * @param string $pdfURL URL to the CAS PDF file
     */
    public function cdsl(
        $password = null,
        $pdfFile = null,
        $pdfURL = null,
        ?RequestOptions $requestOptions = null,
    ): UnifiedResponse {
        $args = [
            'password' => $password, 'pdfFile' => $pdfFile, 'pdfURL' => $pdfURL,
        ];
        $args = Util::array_filter_null($args, ['password', 'pdfFile', 'pdfURL']);
        [$parsed, $options] = CasParserCdslParams::parseRequest(
            $args,
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
     * @param string $password Password for the PDF file (if required)
     * @param string $pdfFile Base64 encoded CAS PDF file
     * @param string $pdfURL URL to the CAS PDF file
     */
    public function nsdl(
        $password = null,
        $pdfFile = null,
        $pdfURL = null,
        ?RequestOptions $requestOptions = null,
    ): UnifiedResponse {
        $args = [
            'password' => $password, 'pdfFile' => $pdfFile, 'pdfURL' => $pdfURL,
        ];
        $args = Util::array_filter_null($args, ['password', 'pdfFile', 'pdfURL']);
        [$parsed, $options] = CasParserNsdlParams::parseRequest(
            $args,
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
     * @param string $password Password for the PDF file (if required)
     * @param string $pdfFile Base64 encoded CAS PDF file
     * @param string $pdfURL URL to the CAS PDF file
     */
    public function smartParse(
        $password = null,
        $pdfFile = null,
        $pdfURL = null,
        ?RequestOptions $requestOptions = null,
    ): UnifiedResponse {
        $args = [
            'password' => $password, 'pdfFile' => $pdfFile, 'pdfURL' => $pdfURL,
        ];
        $args = Util::array_filter_null($args, ['password', 'pdfFile', 'pdfURL']);
        [$parsed, $options] = CasParserSmartParseParams::parseRequest(
            $args,
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
