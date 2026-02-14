<?php

declare(strict_types=1);

namespace CasParser\Services;

use CasParser\Client;
use CasParser\ContractNote\ContractNoteParseParams;
use CasParser\ContractNote\ContractNoteParseParams\BrokerType;
use CasParser\ContractNote\ContractNoteParseResponse;
use CasParser\Core\Contracts\BaseResponse;
use CasParser\Core\Exceptions\APIException;
use CasParser\RequestOptions;
use CasParser\ServiceContracts\ContractNoteRawContract;

/**
 * @phpstan-import-type RequestOpts from \CasParser\RequestOptions
 */
final class ContractNoteRawService implements ContractNoteRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

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
     * @param array{
     *   brokerType?: BrokerType|value-of<BrokerType>,
     *   password?: string,
     *   pdfFile?: string,
     *   pdfURL?: string,
     * }|ContractNoteParseParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ContractNoteParseResponse>
     *
     * @throws APIException
     */
    public function parse(
        array|ContractNoteParseParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ContractNoteParseParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'v4/contract_note/parse',
            body: (object) $parsed,
            options: $options,
            convert: ContractNoteParseResponse::class,
        );
    }
}
