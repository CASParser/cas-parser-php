<?php

declare(strict_types=1);

namespace CasParser\Core\ServiceContracts;

use CasParser\CasParser\UnifiedResponse;
use CasParser\RequestOptions;

use const CasParser\Core\OMIT as omit;

interface CasParserContract
{
    /**
     * @param string $password Password for the PDF file (if required)
     * @param string $pdfFile Base64 encoded CAS PDF file
     * @param string $pdfURL URL to the CAS PDF file
     */
    public function camsKfintech(
        $password = omit,
        $pdfFile = omit,
        $pdfURL = omit,
        ?RequestOptions $requestOptions = null,
    ): UnifiedResponse;

    /**
     * @param string $password Password for the PDF file (if required)
     * @param string $pdfFile Base64 encoded CAS PDF file
     * @param string $pdfURL URL to the CAS PDF file
     */
    public function cdsl(
        $password = omit,
        $pdfFile = omit,
        $pdfURL = omit,
        ?RequestOptions $requestOptions = null,
    ): UnifiedResponse;

    /**
     * @param string $password Password for the PDF file (if required)
     * @param string $pdfFile Base64 encoded CAS PDF file
     * @param string $pdfURL URL to the CAS PDF file
     */
    public function nsdl(
        $password = omit,
        $pdfFile = omit,
        $pdfURL = omit,
        ?RequestOptions $requestOptions = null,
    ): UnifiedResponse;

    /**
     * @param string $password Password for the PDF file (if required)
     * @param string $pdfFile Base64 encoded CAS PDF file
     * @param string $pdfURL URL to the CAS PDF file
     */
    public function smartParse(
        $password = omit,
        $pdfFile = omit,
        $pdfURL = omit,
        ?RequestOptions $requestOptions = null,
    ): UnifiedResponse;
}
