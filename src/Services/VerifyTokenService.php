<?php

declare(strict_types=1);

namespace CasParser\Services;

use CasParser\Client;
use CasParser\Core\Exceptions\APIException;
use CasParser\RequestOptions;
use CasParser\ServiceContracts\VerifyTokenContract;
use CasParser\VerifyToken\VerifyTokenVerifyResponse;

/**
 * Endpoints for managing access tokens for the Portfolio Connect SDK.
 * Use these to generate short-lived `at_` prefixed tokens that can be safely passed to frontend applications.
 * Access tokens can be used in place of API keys on all v4 endpoints.
 *
 * @phpstan-import-type RequestOpts from \CasParser\RequestOptions
 */
final class VerifyTokenService implements VerifyTokenContract
{
    /**
     * @api
     */
    public VerifyTokenRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new VerifyTokenRawService($client);
    }

    /**
     * @api
     *
     * Verify an access token and check if it's still valid.
     * Useful for debugging token issues.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function verify(
        RequestOptions|array|null $requestOptions = null
    ): VerifyTokenVerifyResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->verify(requestOptions: $requestOptions);

        return $response->parse();
    }
}
