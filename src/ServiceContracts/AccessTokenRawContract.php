<?php

declare(strict_types=1);

namespace CasParser\ServiceContracts;

use CasParser\AccessToken\AccessTokenCreateParams;
use CasParser\AccessToken\AccessTokenNewResponse;
use CasParser\Core\Contracts\BaseResponse;
use CasParser\Core\Exceptions\APIException;
use CasParser\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \CasParser\RequestOptions
 */
interface AccessTokenRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|AccessTokenCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AccessTokenNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|AccessTokenCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
