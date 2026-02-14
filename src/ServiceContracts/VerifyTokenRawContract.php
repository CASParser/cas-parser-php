<?php

declare(strict_types=1);

namespace CasParser\ServiceContracts;

use CasParser\Core\Contracts\BaseResponse;
use CasParser\Core\Exceptions\APIException;
use CasParser\RequestOptions;
use CasParser\VerifyToken\VerifyTokenVerifyResponse;

/**
 * @phpstan-import-type RequestOpts from \CasParser\RequestOptions
 */
interface VerifyTokenRawContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VerifyTokenVerifyResponse>
     *
     * @throws APIException
     */
    public function verify(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
