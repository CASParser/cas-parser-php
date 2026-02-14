<?php

declare(strict_types=1);

namespace CasParser\Services;

use CasParser\Client;
use CasParser\ContractNote\ContractNoteParseParams\BrokerType;
use CasParser\ContractNote\ContractNoteParseResponse;
use CasParser\Core\Exceptions\APIException;
use CasParser\Core\Util;
use CasParser\RequestOptions;
use CasParser\ServiceContracts\ContractNoteContract;

/**
 * @phpstan-import-type RequestOpts from \CasParser\RequestOptions
 */
final class ContractNoteService implements ContractNoteContract
{
    /**
     * @api
     */
    public ContractNoteRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ContractNoteRawService($client);
    }

    /**
     * @api
     *
     * This endpoint parses Contract Note PDF files from various brokers including Zerodha, Groww, Upstox, ICICI Securities, and others.
     *
     * **What is a Contract Note?**
     * A contract note is a legal document that provides details of all trades executed by an investor. It includes:
     * - Trade details with timestamps, quantities, and prices
     * - Brokerage and charges breakdown
     * - Settlement information
     * - Regulatory compliance details
     *
     * **Supported Brokers:**
     * - Zerodha Broking Limited
     * - Groww Invest Tech Private Limited
     * - Upstox (RKSV Securities)
     * - ICICI Securities Limited
     * - Auto-detection for unknown brokers
     *
     * **Key Features:**
     * - **Auto-detection**: Automatically identifies broker type from PDF content
     * - **Comprehensive parsing**: Extracts equity transactions, derivatives transactions, detailed trades, and charges
     * - **Flexible input**: Accepts both file upload and URL-based PDF input
     * - **Password protection**: Supports password-protected PDFs
     *
     * The API returns structured data including contract note information, client details, transaction summaries, and detailed trade-by-trade breakdowns.
     *
     * @param BrokerType|value-of<BrokerType> $brokerType Optional broker type override. If not provided, system will auto-detect.
     * @param string $password Password for the PDF file (usually PAN number for Zerodha)
     * @param string $pdfFile Base64 encoded contract note PDF file
     * @param string $pdfURL URL to the contract note PDF file
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function parse(
        BrokerType|string|null $brokerType = null,
        ?string $password = null,
        ?string $pdfFile = null,
        ?string $pdfURL = null,
        RequestOptions|array|null $requestOptions = null,
    ): ContractNoteParseResponse {
        $params = Util::removeNulls(
            [
                'brokerType' => $brokerType,
                'password' => $password,
                'pdfFile' => $pdfFile,
                'pdfURL' => $pdfURL,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->parse(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
