<?php

declare(strict_types=1);

namespace CasParser\Services;

use CasParser\AccessToken\AccessTokenCreateParams;
use CasParser\AccessToken\AccessTokenNewResponse;
use CasParser\Client;
use CasParser\Core\Contracts\BaseResponse;
use CasParser\Core\Exceptions\APIException;
use CasParser\RequestOptions;
use CasParser\ServiceContracts\AccessTokenRawContract;

/**
 * @phpstan-import-type RequestOpts from \CasParser\RequestOptions
 */
final class AccessTokenRawService implements AccessTokenRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Generate a short-lived access token from your API key.
     *
     * **Use this endpoint from your backend** to create tokens that can be safely passed to frontend/SDK.
     *
     * Access tokens:
     * - Are prefixed with `at_` for easy identification
     * - Valid for up to 60 minutes
     * - Can be used in place of API keys on all v4 endpoints
     * - Cannot be used to generate other access tokens
     *
     * @param array{expiryMinutes?: int}|AccessTokenCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AccessTokenNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|AccessTokenCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AccessTokenCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'v1/access-token',
            body: (object) $parsed,
            options: $options,
            convert: AccessTokenNewResponse::class,
        );
    }
}
