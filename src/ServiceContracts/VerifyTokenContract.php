<?php

declare(strict_types=1);

namespace CasParser\ServiceContracts;

use CasParser\Core\Exceptions\APIException;
use CasParser\RequestOptions;
use CasParser\VerifyToken\VerifyTokenVerifyResponse;

/**
 * @phpstan-import-type RequestOpts from \CasParser\RequestOptions
 */
interface VerifyTokenContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function verify(
        RequestOptions|array|null $requestOptions = null
    ): VerifyTokenVerifyResponse;
}
