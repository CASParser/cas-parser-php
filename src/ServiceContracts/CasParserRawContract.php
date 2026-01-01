<?php

declare(strict_types=1);

namespace CasParser\ServiceContracts;

use CasParser\CasParser\CasParserCamsKfintechParams;
use CasParser\CasParser\CasParserCdslParams;
use CasParser\CasParser\CasParserNsdlParams;
use CasParser\CasParser\CasParserSmartParseParams;
use CasParser\CasParser\UnifiedResponse;
use CasParser\Core\Contracts\BaseResponse;
use CasParser\Core\Exceptions\APIException;
use CasParser\RequestOptions;

interface CasParserRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|CasParserCamsKfintechParams $params
     *
     * @return BaseResponse<UnifiedResponse>
     *
     * @throws APIException
     */
    public function camsKfintech(
        array|CasParserCamsKfintechParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CasParserCdslParams $params
     *
     * @return BaseResponse<UnifiedResponse>
     *
     * @throws APIException
     */
    public function cdsl(
        array|CasParserCdslParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CasParserNsdlParams $params
     *
     * @return BaseResponse<UnifiedResponse>
     *
     * @throws APIException
     */
    public function nsdl(
        array|CasParserNsdlParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CasParserSmartParseParams $params
     *
     * @return BaseResponse<UnifiedResponse>
     *
     * @throws APIException
     */
    public function smartParse(
        array|CasParserSmartParseParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
