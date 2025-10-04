<?php

declare(strict_types=1);

namespace CasParser\ServiceContracts;

use CasParser\CasParser\UnifiedResponse;
use CasParser\Core\Exceptions\APIException;
use CasParser\RequestOptions;

use const CasParser\Core\OMIT as omit;

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
        $password = omit,
        $pdfFile = omit,
        $pdfURL = omit,
        ?RequestOptions $requestOptions = null,
    ): UnifiedResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function camsKfintechRaw(
        array $params,
        ?RequestOptions $requestOptions = null
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
        $password = omit,
        $pdfFile = omit,
        $pdfURL = omit,
        ?RequestOptions $requestOptions = null,
    ): UnifiedResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function cdslRaw(
        array $params,
        ?RequestOptions $requestOptions = null
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
        $password = omit,
        $pdfFile = omit,
        $pdfURL = omit,
        ?RequestOptions $requestOptions = null,
    ): UnifiedResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function nsdlRaw(
        array $params,
        ?RequestOptions $requestOptions = null
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
        $password = omit,
        $pdfFile = omit,
        $pdfURL = omit,
        ?RequestOptions $requestOptions = null,
    ): UnifiedResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function smartParseRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): UnifiedResponse;
}
