<?php

declare(strict_types=1);

namespace CasParser\ServiceContracts;

use CasParser\AccessToken\AccessTokenNewResponse;
use CasParser\Core\Exceptions\APIException;
use CasParser\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \CasParser\RequestOptions
 */
interface AccessTokenContract
{
    /**
     * @api
     *
     * @param int $expiryMinutes Token validity in minutes (max 60)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        int $expiryMinutes = 60,
        RequestOptions|array|null $requestOptions = null
    ): AccessTokenNewResponse;
}
