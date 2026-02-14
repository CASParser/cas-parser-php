<?php

declare(strict_types=1);

namespace CasParser\Services;

use CasParser\CamsKfintech\UnifiedResponse;
use CasParser\Client;
use CasParser\Core\Exceptions\APIException;
use CasParser\Core\Util;
use CasParser\RequestOptions;
use CasParser\ServiceContracts\SmartContract;

/**
 * @phpstan-import-type RequestOpts from \CasParser\RequestOptions
 */
final class SmartService implements SmartContract
{
    /**
     * @api
     */
    public SmartRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SmartRawService($client);
    }

    /**
     * @api
     *
     * This endpoint parses CAS (Consolidated Account Statement) PDF files from NSDL, CDSL, or CAMS/KFintech and returns data in a unified format.
     * It auto-detects the CAS type and transforms the data into a consistent structure regardless of the source.
     *
     * @param string $password Password for the PDF file (if required)
     * @param string $pdfFile Base64 encoded CAS PDF file (required if pdf_url not provided)
     * @param string $pdfURL URL to the CAS PDF file (required if pdf_file not provided)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function parseCasPdf(
        ?string $password = null,
        ?string $pdfFile = null,
        ?string $pdfURL = null,
        RequestOptions|array|null $requestOptions = null,
    ): UnifiedResponse {
        $params = Util::removeNulls(
            ['password' => $password, 'pdfFile' => $pdfFile, 'pdfURL' => $pdfURL]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->parseCasPdf(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
