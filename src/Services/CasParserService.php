<?php

declare(strict_types=1);

namespace CasParser\Services;

use CasParser\CasParser\CasParserCamsKfintechParams;
use CasParser\CasParser\CasParserCdslParams;
use CasParser\CasParser\CasParserNsdlParams;
use CasParser\CasParser\CasParserSmartParseParams;
use CasParser\CasParser\UnifiedResponse;
use CasParser\Client;
use CasParser\Core\Exceptions\APIException;
use CasParser\RequestOptions;
use CasParser\ServiceContracts\CasParserContract;

use const CasParser\Core\OMIT as omit;

final class CasParserService implements CasParserContract
{
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
     * @param string $password Password for the PDF file (if required)
     * @param string $pdfFile Base64 encoded CAS PDF file
     * @param string $pdfURL URL to the CAS PDF file
     *
     * @throws APIException
     */
    public function camsKfintech(
        $password = omit,
        $pdfFile = omit,
        $pdfURL = omit,
        ?RequestOptions $requestOptions = null,
    ): UnifiedResponse {
        $params = [
            'password' => $password, 'pdfFile' => $pdfFile, 'pdfURL' => $pdfURL,
        ];

        return $this->camsKfintechRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function camsKfintechRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): UnifiedResponse {
        [$parsed, $options] = CasParserCamsKfintechParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'v4/cams_kfintech/parse',
            body: (object) $parsed,
            options: $options,
            convert: UnifiedResponse::class,
        );
    }

    /**
     * @api
     *
     * This endpoint specifically parses CDSL CAS (Consolidated Account Statement) PDF files and returns data in a unified format.
     * Use this endpoint when you know the PDF is from CDSL.
     *
     * @param string $password Password for the PDF file (if required)
     * @param string $pdfFile Base64 encoded CAS PDF file
     * @param string $pdfURL URL to the CAS PDF file
     *
     * @throws APIException
     */
    public function cdsl(
        $password = omit,
        $pdfFile = omit,
        $pdfURL = omit,
        ?RequestOptions $requestOptions = null,
    ): UnifiedResponse {
        $params = [
            'password' => $password, 'pdfFile' => $pdfFile, 'pdfURL' => $pdfURL,
        ];

        return $this->cdslRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function cdslRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): UnifiedResponse {
        [$parsed, $options] = CasParserCdslParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'v4/cdsl/parse',
            body: (object) $parsed,
            options: $options,
            convert: UnifiedResponse::class,
        );
    }

    /**
     * @api
     *
     * This endpoint specifically parses NSDL CAS (Consolidated Account Statement) PDF files and returns data in a unified format.
     * Use this endpoint when you know the PDF is from NSDL.
     *
     * @param string $password Password for the PDF file (if required)
     * @param string $pdfFile Base64 encoded CAS PDF file
     * @param string $pdfURL URL to the CAS PDF file
     *
     * @throws APIException
     */
    public function nsdl(
        $password = omit,
        $pdfFile = omit,
        $pdfURL = omit,
        ?RequestOptions $requestOptions = null,
    ): UnifiedResponse {
        $params = [
            'password' => $password, 'pdfFile' => $pdfFile, 'pdfURL' => $pdfURL,
        ];

        return $this->nsdlRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function nsdlRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): UnifiedResponse {
        [$parsed, $options] = CasParserNsdlParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'v4/nsdl/parse',
            body: (object) $parsed,
            options: $options,
            convert: UnifiedResponse::class,
        );
    }

    /**
     * @api
     *
     * This endpoint parses CAS (Consolidated Account Statement) PDF files from NSDL, CDSL, or CAMS/KFintech and returns data in a unified format.
     * It auto-detects the CAS type and transforms the data into a consistent structure regardless of the source.
     *
     * @param string $password Password for the PDF file (if required)
     * @param string $pdfFile Base64 encoded CAS PDF file
     * @param string $pdfURL URL to the CAS PDF file
     *
     * @throws APIException
     */
    public function smartParse(
        $password = omit,
        $pdfFile = omit,
        $pdfURL = omit,
        ?RequestOptions $requestOptions = null,
    ): UnifiedResponse {
        $params = [
            'password' => $password, 'pdfFile' => $pdfFile, 'pdfURL' => $pdfURL,
        ];

        return $this->smartParseRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function smartParseRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): UnifiedResponse {
        [$parsed, $options] = CasParserSmartParseParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'v4/smart/parse',
            body: (object) $parsed,
            options: $options,
            convert: UnifiedResponse::class,
        );
    }
}
