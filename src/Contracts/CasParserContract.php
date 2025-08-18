<?php

declare(strict_types=1);

namespace CasParser\Contracts;

use CasParser\CasParser\CasParserCamsKfintechParams;
use CasParser\CasParser\CasParserCdslParams;
use CasParser\CasParser\CasParserNsdlParams;
use CasParser\CasParser\CasParserSmartParseParams;
use CasParser\CasParser\UnifiedResponse;
use CasParser\RequestOptions;

interface CasParserContract
{
    /**
     * @param array{
     *   password?: string, pdfFile?: string, pdfURL?: string
     * }|CasParserCamsKfintechParams $params
     */
    public function camsKfintech(
        array|CasParserCamsKfintechParams $params,
        ?RequestOptions $requestOptions = null,
    ): UnifiedResponse;

    /**
     * @param array{
     *   password?: string, pdfFile?: string, pdfURL?: string
     * }|CasParserCdslParams $params
     */
    public function cdsl(
        array|CasParserCdslParams $params,
        ?RequestOptions $requestOptions = null,
    ): UnifiedResponse;

    /**
     * @param array{
     *   password?: string, pdfFile?: string, pdfURL?: string
     * }|CasParserNsdlParams $params
     */
    public function nsdl(
        array|CasParserNsdlParams $params,
        ?RequestOptions $requestOptions = null,
    ): UnifiedResponse;

    /**
     * @param array{
     *   password?: string, pdfFile?: string, pdfURL?: string
     * }|CasParserSmartParseParams $params
     */
    public function smartParse(
        array|CasParserSmartParseParams $params,
        ?RequestOptions $requestOptions = null,
    ): UnifiedResponse;
}
