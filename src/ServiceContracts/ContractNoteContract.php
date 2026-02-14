<?php

declare(strict_types=1);

namespace CasParser\ServiceContracts;

use CasParser\ContractNote\ContractNoteParseParams\BrokerType;
use CasParser\ContractNote\ContractNoteParseResponse;
use CasParser\Core\Exceptions\APIException;
use CasParser\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \CasParser\RequestOptions
 */
interface ContractNoteContract
{
    /**
     * @api
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
    ): ContractNoteParseResponse;
}
