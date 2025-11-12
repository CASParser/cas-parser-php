<?php

declare(strict_types=1);

namespace CasParser\ServiceContracts;

use CasParser\CasParser\CasParserCamsKfintechParams;
use CasParser\CasParser\CasParserCdslParams;
use CasParser\CasParser\CasParserNsdlParams;
use CasParser\CasParser\CasParserSmartParseParams;
use CasParser\CasParser\UnifiedResponse;
use CasParser\Core\Exceptions\APIException;
use CasParser\RequestOptions;

interface CasParserContract
{
    /**
     * @api
     *
     * @param array<mixed>|CasParserCamsKfintechParams $params
     *
     * @throws APIException
     */
    public function camsKfintech(
        array|CasParserCamsKfintechParams $params,
        ?RequestOptions $requestOptions = null,
    ): UnifiedResponse;

    /**
     * @api
     *
     * @param array<mixed>|CasParserCdslParams $params
     *
     * @throws APIException
     */
    public function cdsl(
        array|CasParserCdslParams $params,
        ?RequestOptions $requestOptions = null,
    ): UnifiedResponse;

    /**
     * @api
     *
     * @param array<mixed>|CasParserNsdlParams $params
     *
     * @throws APIException
     */
    public function nsdl(
        array|CasParserNsdlParams $params,
        ?RequestOptions $requestOptions = null,
    ): UnifiedResponse;

    /**
     * @api
     *
     * @param array<mixed>|CasParserSmartParseParams $params
     *
     * @throws APIException
     */
    public function smartParse(
        array|CasParserSmartParseParams $params,
        ?RequestOptions $requestOptions = null,
    ): UnifiedResponse;
}
