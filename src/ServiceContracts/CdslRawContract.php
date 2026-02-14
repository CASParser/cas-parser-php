<?php

declare(strict_types=1);

namespace CasParser\ServiceContracts;

use CasParser\CamsKfintech\UnifiedResponse;
use CasParser\Cdsl\CdslParsePdfParams;
use CasParser\Core\Contracts\BaseResponse;
use CasParser\Core\Exceptions\APIException;
use CasParser\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \CasParser\RequestOptions
 */
interface CdslRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|CdslParsePdfParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UnifiedResponse>
     *
     * @throws APIException
     */
    public function parsePdf(
        array|CdslParsePdfParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
