<?php

declare(strict_types=1);

namespace CasParser\ServiceContracts;

use CasParser\CamsKfintech\UnifiedResponse;
use CasParser\Core\Contracts\BaseResponse;
use CasParser\Core\Exceptions\APIException;
use CasParser\RequestOptions;
use CasParser\Smart\SmartParseCasPdfParams;

/**
 * @phpstan-import-type RequestOpts from \CasParser\RequestOptions
 */
interface SmartRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|SmartParseCasPdfParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UnifiedResponse>
     *
     * @throws APIException
     */
    public function parseCasPdf(
        array|SmartParseCasPdfParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
