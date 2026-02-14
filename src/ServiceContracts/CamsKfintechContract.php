<?php

declare(strict_types=1);

namespace CasParser\ServiceContracts;

use CasParser\CamsKfintech\UnifiedResponse;
use CasParser\Core\Exceptions\APIException;
use CasParser\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \CasParser\RequestOptions
 */
interface CamsKfintechContract
{
    /**
     * @api
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
    ): UnifiedResponse;
}
