<?php

declare(strict_types=1);

namespace CasParser\Services;

use CasParser\Client;
use CasParser\Core\Contracts\BaseResponse;
use CasParser\Core\Exceptions\APIException;
use CasParser\Credits\CreditCheckResponse;
use CasParser\RequestOptions;
use CasParser\ServiceContracts\CreditsRawContract;

/**
 * @phpstan-import-type RequestOpts from \CasParser\RequestOptions
 */
final class CreditsRawService implements CreditsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

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
     * @return BaseResponse<CreditCheckResponse>
     *
     * @throws APIException
     */
    public function check(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'credits',
            options: $requestOptions,
            convert: CreditCheckResponse::class,
        );
    }
}
