<?php

declare(strict_types=1);

namespace CasParser\ServiceContracts;

use CasParser\CasParser\UnifiedResponse;
use CasParser\Core\Exceptions\APIException;
use CasParser\RequestOptions;

interface CasParserContract
{
    /**
     * @api
     *
     * @param string $password Password for the PDF file (if required)
     * @param string $pdfFile Base64 encoded CAS PDF file
     * @param string $pdfURL URL to the CAS PDF file
     *
     * @throws APIException
     */
    public function camsKfintech(
        ?string $password = null,
        ?string $pdfFile = null,
        ?string $pdfURL = null,
        ?RequestOptions $requestOptions = null,
    ): UnifiedResponse;

    /**
     * @api
     *
     * @param string $password Password for the PDF file (if required)
     * @param string $pdfFile Base64 encoded CAS PDF file
     * @param string $pdfURL URL to the CAS PDF file
     *
     * @throws APIException
     */
    public function cdsl(
        ?string $password = null,
        ?string $pdfFile = null,
        ?string $pdfURL = null,
        ?RequestOptions $requestOptions = null,
    ): UnifiedResponse;

    /**
     * @api
     *
     * @param string $password Password for the PDF file (if required)
     * @param string $pdfFile Base64 encoded CAS PDF file
     * @param string $pdfURL URL to the CAS PDF file
     *
     * @throws APIException
     */
    public function nsdl(
        ?string $password = null,
        ?string $pdfFile = null,
        ?string $pdfURL = null,
        ?RequestOptions $requestOptions = null,
    ): UnifiedResponse;

    /**
     * @api
     *
     * @param string $password Password for the PDF file (if required)
     * @param string $pdfFile Base64 encoded CAS PDF file
     * @param string $pdfURL URL to the CAS PDF file
     *
     * @throws APIException
     */
    public function smartParse(
        ?string $password = null,
        ?string $pdfFile = null,
        ?string $pdfURL = null,
        ?RequestOptions $requestOptions = null,
    ): UnifiedResponse;
}
