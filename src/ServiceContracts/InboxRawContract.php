<?php

declare(strict_types=1);

namespace CasParser\ServiceContracts;

use CasParser\Core\Contracts\BaseResponse;
use CasParser\Core\Exceptions\APIException;
use CasParser\Inbox\InboxCheckConnectionStatusParams;
use CasParser\Inbox\InboxCheckConnectionStatusResponse;
use CasParser\Inbox\InboxConnectEmailParams;
use CasParser\Inbox\InboxConnectEmailResponse;
use CasParser\Inbox\InboxDisconnectEmailParams;
use CasParser\Inbox\InboxDisconnectEmailResponse;
use CasParser\Inbox\InboxListCasFilesParams;
use CasParser\Inbox\InboxListCasFilesResponse;
use CasParser\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \CasParser\RequestOptions
 */
interface InboxRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|InboxCheckConnectionStatusParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<InboxCheckConnectionStatusResponse>
     *
     * @throws APIException
     */
    public function checkConnectionStatus(
        array|InboxCheckConnectionStatusParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|InboxConnectEmailParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<InboxConnectEmailResponse>
     *
     * @throws APIException
     */
    public function connectEmail(
        array|InboxConnectEmailParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|InboxDisconnectEmailParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<InboxDisconnectEmailResponse>
     *
     * @throws APIException
     */
    public function disconnectEmail(
        array|InboxDisconnectEmailParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|InboxListCasFilesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<InboxListCasFilesResponse>
     *
     * @throws APIException
     */
    public function listCasFiles(
        array|InboxListCasFilesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
