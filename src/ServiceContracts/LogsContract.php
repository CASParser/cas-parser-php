<?php

declare(strict_types=1);

namespace CasParser\ServiceContracts;

use CasParser\Core\Exceptions\APIException;
use CasParser\Logs\LogGetSummaryResponse;
use CasParser\Logs\LogNewResponse;
use CasParser\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \CasParser\RequestOptions
 */
interface LogsContract
{
    /**
     * @api
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
    ): LogNewResponse;

    /**
     * @api
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
    ): LogGetSummaryResponse;
}
