<?php

declare(strict_types=1);

namespace CasParser\Services;

use CasParser\Client;
use CasParser\Core\Exceptions\APIException;
use CasParser\Credits\CreditCheckResponse;
use CasParser\RequestOptions;
use CasParser\ServiceContracts\CreditsContract;

/**
 * @phpstan-import-type RequestOpts from \CasParser\RequestOptions
 */
final class CreditsService implements CreditsContract
{
    /**
     * @api
     */
    public CreditsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CreditsRawService($client);
    }

    /**
     * @api
     *
     * Check your remaining API credits and usage for the current billing period.
     *
     * Returns:
     * - Number of API calls used and remaining credits
     * - Credit limit and reset date
     * - List of enabled features for your plan
     *
     * Credits reset at the start of each billing period.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function check(
        RequestOptions|array|null $requestOptions = null
    ): CreditCheckResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->check(requestOptions: $requestOptions);

        return $response->parse();
    }
}
