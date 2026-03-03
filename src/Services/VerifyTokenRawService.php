<?php

declare(strict_types=1);

namespace CasParser\Services;

use CasParser\Client;
use CasParser\Core\Contracts\BaseResponse;
use CasParser\Core\Exceptions\APIException;
use CasParser\RequestOptions;
use CasParser\ServiceContracts\VerifyTokenRawContract;
use CasParser\VerifyToken\VerifyTokenVerifyResponse;

/**
 * Endpoints for managing access tokens for the Portfolio Connect SDK.
 * Use these to generate short-lived `at_` prefixed tokens that can be safely passed to frontend applications.
 * Access tokens can be used in place of API keys on all v4 endpoints.
 *
 * @phpstan-import-type RequestOpts from \CasParser\RequestOptions
 */
final class VerifyTokenRawService implements VerifyTokenRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Verify an access token and check if it's still valid.
     * Useful for debugging token issues.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VerifyTokenVerifyResponse>
     *
     * @throws APIException
     */
    public function verify(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'v1/token/verify',
            options: $requestOptions,
            convert: VerifyTokenVerifyResponse::class,
        );
    }
}
