<?php

declare(strict_types=1);

namespace CasParser\Contracts;

use CasParser\CasParser\UnifiedResponse;
use CasParser\RequestOptions;

interface CasParserContract
{
    /**
     * @param string $password Password for the PDF file (if required)
     * @param string $pdfFile Base64 encoded CAS PDF file
     * @param string $pdfURL URL to the CAS PDF file
     */
    public function camsKfintech(
        $password = null,
        $pdfFile = null,
        $pdfURL = null,
        ?RequestOptions $requestOptions = null,
    ): UnifiedResponse;

    /**
     * @param string $password Password for the PDF file (if required)
     * @param string $pdfFile Base64 encoded CAS PDF file
     * @param string $pdfURL URL to the CAS PDF file
     */
    public function cdsl(
        $password = null,
        $pdfFile = null,
        $pdfURL = null,
        ?RequestOptions $requestOptions = null,
    ): UnifiedResponse;

    /**
     * @param string $password Password for the PDF file (if required)
     * @param string $pdfFile Base64 encoded CAS PDF file
     * @param string $pdfURL URL to the CAS PDF file
     */
    public function nsdl(
        $password = null,
        $pdfFile = null,
        $pdfURL = null,
        ?RequestOptions $requestOptions = null,
    ): UnifiedResponse;

    /**
     * @param string $password Password for the PDF file (if required)
     * @param string $pdfFile Base64 encoded CAS PDF file
     * @param string $pdfURL URL to the CAS PDF file
     */
    public function smartParse(
        $password = null,
        $pdfFile = null,
        $pdfURL = null,
        ?RequestOptions $requestOptions = null,
    ): UnifiedResponse;
}
