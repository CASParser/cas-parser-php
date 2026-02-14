<?php

declare(strict_types=1);

namespace CasParser\ServiceContracts;

use CasParser\CamsKfintech\UnifiedResponse;
use CasParser\Core\Contracts\BaseResponse;
use CasParser\Core\Exceptions\APIException;
use CasParser\Nsdl\NsdlParseParams;
use CasParser\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \CasParser\RequestOptions
 */
interface NsdlRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|NsdlParseParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UnifiedResponse>
     *
     * @throws APIException
     */
    public function parse(
        array|NsdlParseParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
