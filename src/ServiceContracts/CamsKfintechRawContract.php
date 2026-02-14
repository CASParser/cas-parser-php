<?php

declare(strict_types=1);

namespace CasParser\ServiceContracts;

use CasParser\CamsKfintech\CamsKfintechParseParams;
use CasParser\CamsKfintech\UnifiedResponse;
use CasParser\Core\Contracts\BaseResponse;
use CasParser\Core\Exceptions\APIException;
use CasParser\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \CasParser\RequestOptions
 */
interface CamsKfintechRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|CamsKfintechParseParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UnifiedResponse>
     *
     * @throws APIException
     */
    public function parse(
        array|CamsKfintechParseParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
