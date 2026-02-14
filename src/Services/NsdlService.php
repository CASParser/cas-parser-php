<?php

declare(strict_types=1);

namespace CasParser\Services;

use CasParser\CamsKfintech\UnifiedResponse;
use CasParser\Client;
use CasParser\Core\Exceptions\APIException;
use CasParser\Core\Util;
use CasParser\RequestOptions;
use CasParser\ServiceContracts\NsdlContract;

/**
 * @phpstan-import-type RequestOpts from \CasParser\RequestOptions
 */
final class NsdlService implements NsdlContract
{
    /**
     * @api
     */
    public NsdlRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new NsdlRawService($client);
    }

    /**
     * @api
     *
     * This endpoint specifically parses NSDL CAS (Consolidated Account Statement) PDF files and returns data in a unified format.
     * Use this endpoint when you know the PDF is from NSDL.
     *
     * @param string $password Password for the PDF file (if required)
     * @param string $pdfFile Base64 encoded CAS PDF file (required if pdf_url not provided)
     * @param string $pdfURL URL to the CAS PDF file (required if pdf_file not provided)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function parse(
        ?string $password = null,
        ?string $pdfFile = null,
        ?string $pdfURL = null,
        RequestOptions|array|null $requestOptions = null,
    ): UnifiedResponse {
        $params = Util::removeNulls(
            ['password' => $password, 'pdfFile' => $pdfFile, 'pdfURL' => $pdfURL]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->parse(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
