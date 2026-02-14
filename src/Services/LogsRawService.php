<?php

declare(strict_types=1);

namespace CasParser\Services;

use CasParser\Client;
use CasParser\Core\Contracts\BaseResponse;
use CasParser\Core\Exceptions\APIException;
use CasParser\Logs\LogCreateParams;
use CasParser\Logs\LogGetSummaryParams;
use CasParser\Logs\LogGetSummaryResponse;
use CasParser\Logs\LogNewResponse;
use CasParser\RequestOptions;
use CasParser\ServiceContracts\LogsRawContract;

/**
 * @phpstan-import-type RequestOpts from \CasParser\RequestOptions
 */
final class LogsRawService implements LogsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve detailed API usage logs for your account.
     *
     * Returns a list of API calls with timestamps, features used, status codes, and credits consumed.
     * Useful for monitoring usage patterns and debugging.
     *
     * @param array{
     *   endTime?: \DateTimeInterface, limit?: int, startTime?: \DateTimeInterface
     * }|LogCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<LogNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|LogCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LogCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'logs',
            body: (object) $parsed,
            options: $options,
            convert: LogNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Get aggregated usage statistics grouped by feature.
     *
     * Useful for understanding which API features are being used most and tracking usage trends.
     *
     * @param array{
     *   endTime?: \DateTimeInterface, startTime?: \DateTimeInterface
     * }|LogGetSummaryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<LogGetSummaryResponse>
     *
     * @throws APIException
     */
    public function getSummary(
        array|LogGetSummaryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LogGetSummaryParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'logs/summary',
            body: (object) $parsed,
            options: $options,
            convert: LogGetSummaryResponse::class,
        );
    }
}
