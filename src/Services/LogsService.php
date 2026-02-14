<?php

declare(strict_types=1);

namespace CasParser\Services;

use CasParser\Client;
use CasParser\Core\Exceptions\APIException;
use CasParser\Core\Util;
use CasParser\Logs\LogGetSummaryResponse;
use CasParser\Logs\LogNewResponse;
use CasParser\RequestOptions;
use CasParser\ServiceContracts\LogsContract;

/**
 * @phpstan-import-type RequestOpts from \CasParser\RequestOptions
 */
final class LogsService implements LogsContract
{
    /**
     * @api
     */
    public LogsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new LogsRawService($client);
    }

    /**
     * @api
     *
     * Retrieve detailed API usage logs for your account.
     *
     * Returns a list of API calls with timestamps, features used, status codes, and credits consumed.
     * Useful for monitoring usage patterns and debugging.
     *
     * @param \DateTimeInterface $endTime End time filter (ISO 8601). Defaults to now.
     * @param int $limit Maximum number of logs to return
     * @param \DateTimeInterface $startTime Start time filter (ISO 8601). Defaults to 30 days ago.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        ?\DateTimeInterface $endTime = null,
        int $limit = 100,
        ?\DateTimeInterface $startTime = null,
        RequestOptions|array|null $requestOptions = null,
    ): LogNewResponse {
        $params = Util::removeNulls(
            ['endTime' => $endTime, 'limit' => $limit, 'startTime' => $startTime]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get aggregated usage statistics grouped by feature.
     *
     * Useful for understanding which API features are being used most and tracking usage trends.
     *
     * @param \DateTimeInterface $endTime End time filter (ISO 8601). Defaults to now.
     * @param \DateTimeInterface $startTime Start time filter (ISO 8601). Defaults to start of current month.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getSummary(
        ?\DateTimeInterface $endTime = null,
        ?\DateTimeInterface $startTime = null,
        RequestOptions|array|null $requestOptions = null,
    ): LogGetSummaryResponse {
        $params = Util::removeNulls(
            ['endTime' => $endTime, 'startTime' => $startTime]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getSummary(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
