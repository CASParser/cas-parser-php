<?php

declare(strict_types=1);

namespace CasParser\ServiceContracts;

use CasParser\Core\Contracts\BaseResponse;
use CasParser\Core\Exceptions\APIException;
use CasParser\Logs\LogCreateParams;
use CasParser\Logs\LogGetSummaryParams;
use CasParser\Logs\LogGetSummaryResponse;
use CasParser\Logs\LogNewResponse;
use CasParser\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \CasParser\RequestOptions
 */
interface LogsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|LogCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<LogNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|LogCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|LogGetSummaryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<LogGetSummaryResponse>
     *
     * @throws APIException
     */
    public function getSummary(
        array|LogGetSummaryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
