<?php

declare(strict_types=1);

namespace CasParser\Services;

use CasParser\AccessToken\AccessTokenNewResponse;
use CasParser\Client;
use CasParser\Core\Exceptions\APIException;
use CasParser\Core\Util;
use CasParser\RequestOptions;
use CasParser\ServiceContracts\AccessTokenContract;

/**
 * @phpstan-import-type RequestOpts from \CasParser\RequestOptions
 */
final class AccessTokenService implements AccessTokenContract
{
    /**
     * @api
     */
    public AccessTokenRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AccessTokenRawService($client);
    }

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
     * @param int $expiryMinutes Token validity in minutes (max 60)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        int $expiryMinutes = 60,
        RequestOptions|array|null $requestOptions = null
    ): AccessTokenNewResponse {
        $params = Util::removeNulls(['expiryMinutes' => $expiryMinutes]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
