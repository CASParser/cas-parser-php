<?php

declare(strict_types=1);

namespace CasParser\Services;

use CasParser\CasParser\UnifiedResponse;
use CasParser\Client;
use CasParser\Core\Exceptions\APIException;
use CasParser\Core\Util;
use CasParser\RequestOptions;
use CasParser\ServiceContracts\CasParserContract;

/**
 * @phpstan-import-type RequestOpts from \CasParser\RequestOptions
 */
final class CasParserService implements CasParserContract
{
    /**
     * @api
     */
    public CasParserRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CasParserRawService($client);
    }

    /**
     * @api
     *
     * This endpoint specifically parses CAMS/KFintech CAS (Consolidated Account Statement) PDF files and returns data in a unified format.
     * Use this endpoint when you know the PDF is from CAMS or KFintech.
     *
     * @param string $password Password for the PDF file (if required)
     * @param string $pdfFile Base64 encoded CAS PDF file
     * @param string $pdfURL URL to the CAS PDF file
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function camsKfintech(
        ?string $password = null,
        ?string $pdfFile = null,
        ?string $pdfURL = null,
        RequestOptions|array|null $requestOptions = null,
    ): UnifiedResponse {
        $params = Util::removeNulls(
            ['password' => $password, 'pdfFile' => $pdfFile, 'pdfURL' => $pdfURL]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->camsKfintech(params: $params, requestOptions: $requestOptions);

        return $response->parse();
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function cdsl(
        ?string $password = null,
        ?string $pdfFile = null,
        ?string $pdfURL = null,
        RequestOptions|array|null $requestOptions = null,
    ): UnifiedResponse {
        $params = Util::removeNulls(
            ['password' => $password, 'pdfFile' => $pdfFile, 'pdfURL' => $pdfURL]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->cdsl(params: $params, requestOptions: $requestOptions);

        return $response->parse();
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function nsdl(
        ?string $password = null,
        ?string $pdfFile = null,
        ?string $pdfURL = null,
        RequestOptions|array|null $requestOptions = null,
    ): UnifiedResponse {
        $params = Util::removeNulls(
            ['password' => $password, 'pdfFile' => $pdfFile, 'pdfURL' => $pdfURL]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->nsdl(params: $params, requestOptions: $requestOptions);

        return $response->parse();
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function smartParse(
        ?string $password = null,
        ?string $pdfFile = null,
        ?string $pdfURL = null,
        RequestOptions|array|null $requestOptions = null,
    ): UnifiedResponse {
        $params = Util::removeNulls(
            ['password' => $password, 'pdfFile' => $pdfFile, 'pdfURL' => $pdfURL]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->smartParse(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
