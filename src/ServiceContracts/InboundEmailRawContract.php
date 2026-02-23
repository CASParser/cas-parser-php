<?php

declare(strict_types=1);

namespace CasParser\ServiceContracts;

use CasParser\Core\Contracts\BaseResponse;
use CasParser\Core\Exceptions\APIException;
use CasParser\InboundEmail\InboundEmailCreateParams;
use CasParser\InboundEmail\InboundEmailDeleteResponse;
use CasParser\InboundEmail\InboundEmailGetResponse;
use CasParser\InboundEmail\InboundEmailListParams;
use CasParser\InboundEmail\InboundEmailListResponse;
use CasParser\InboundEmail\InboundEmailNewResponse;
use CasParser\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \CasParser\RequestOptions
 */
interface InboundEmailRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|InboundEmailCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<InboundEmailNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|InboundEmailCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $inboundEmailID Inbound Email ID (e.g., ie_a1b2c3d4e5f6)
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<InboundEmailGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $inboundEmailID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|InboundEmailListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<InboundEmailListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|InboundEmailListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $inboundEmailID Inbound Email ID to delete
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<InboundEmailDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $inboundEmailID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
