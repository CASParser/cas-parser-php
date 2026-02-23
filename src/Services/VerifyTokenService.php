<?php

declare(strict_types=1);

namespace CasParser\Services;

use CasParser\Client;
use CasParser\Core\Exceptions\APIException;
use CasParser\RequestOptions;
use CasParser\ServiceContracts\VerifyTokenContract;
use CasParser\VerifyToken\VerifyTokenVerifyResponse;

/**
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
