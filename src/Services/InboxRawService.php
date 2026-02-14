<?php

declare(strict_types=1);

namespace CasParser\Services;

use CasParser\Client;
use CasParser\Core\Contracts\BaseResponse;
use CasParser\Core\Exceptions\APIException;
use CasParser\Core\Util;
use CasParser\Inbox\InboxCheckConnectionStatusParams;
use CasParser\Inbox\InboxCheckConnectionStatusResponse;
use CasParser\Inbox\InboxConnectEmailParams;
use CasParser\Inbox\InboxConnectEmailResponse;
use CasParser\Inbox\InboxDisconnectEmailParams;
use CasParser\Inbox\InboxDisconnectEmailResponse;
use CasParser\Inbox\InboxListCasFilesParams;
use CasParser\Inbox\InboxListCasFilesParams\CasType;
use CasParser\Inbox\InboxListCasFilesResponse;
use CasParser\RequestOptions;
use CasParser\ServiceContracts\InboxRawContract;

/**
 * @phpstan-import-type RequestOpts from \CasParser\RequestOptions
 */
final class InboxRawService implements InboxRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Verify if an `inbox_token` is still valid and check connection status.
     *
     * Use this to check if the user needs to re-authenticate (e.g., if they
     * revoked access in their email provider settings).
     *
     * @param array{xInboxToken: string}|InboxCheckConnectionStatusParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<InboxCheckConnectionStatusResponse>
     *
     * @throws APIException
     */
    public function checkConnectionStatus(
        array|InboxCheckConnectionStatusParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = InboxCheckConnectionStatusParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'v4/inbox/status',
            headers: Util::array_transform_keys(
                $parsed,
                ['xInboxToken' => 'x-inbox-token']
            ),
            options: $options,
            convert: InboxCheckConnectionStatusResponse::class,
        );
    }

    /**
     * @api
     *
     * Initiate OAuth flow to connect user's email inbox.
     *
     * Returns an `oauth_url` that you should redirect the user to. After authorization,
     * they are redirected back to your `redirect_uri` with the following query parameters:
     *
     * **On success:**
     * - `inbox_token` - Encrypted token to store client-side
     * - `email` - Email address of the connected account
     * - `state` - Your original state parameter (for CSRF verification)
     *
     * **On error:**
     * - `error` - Error code (e.g., `access_denied`, `token_exchange_failed`)
     * - `state` - Your original state parameter
     *
     * **Store the `inbox_token` client-side** and use it for all subsequent inbox API calls.
     *
     * @param array{
     *   redirectUri: string, state?: string
     * }|InboxConnectEmailParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<InboxConnectEmailResponse>
     *
     * @throws APIException
     */
    public function connectEmail(
        array|InboxConnectEmailParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = InboxConnectEmailParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'v4/inbox/connect',
            body: (object) $parsed,
            options: $options,
            convert: InboxConnectEmailResponse::class,
        );
    }

    /**
     * @api
     *
     * Revoke email access and invalidate the token.
     *
     * This calls the provider's token revocation API (e.g., Google's revoke endpoint)
     * to ensure the user's consent is properly removed.
     *
     * After calling this, the `inbox_token` becomes unusable.
     *
     * @param array{xInboxToken: string}|InboxDisconnectEmailParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<InboxDisconnectEmailResponse>
     *
     * @throws APIException
     */
    public function disconnectEmail(
        array|InboxDisconnectEmailParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = InboxDisconnectEmailParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'v4/inbox/disconnect',
            headers: Util::array_transform_keys(
                $parsed,
                ['xInboxToken' => 'x-inbox-token']
            ),
            options: $options,
            convert: InboxDisconnectEmailResponse::class,
        );
    }

    /**
     * @api
     *
     * Search the user's email inbox for CAS files from known senders
     * (CAMS, KFintech, CDSL, NSDL).
     *
     * Files are uploaded to temporary cloud storage. **URLs expire in 24 hours.**
     *
     * Optionally filter by CAS provider and date range.
     *
     * **Billing:** 0.2 credits per request (charged regardless of success or number of files found).
     *
     * @param array{
     *   xInboxToken: string,
     *   casTypes?: list<CasType|value-of<CasType>>,
     *   endDate?: string,
     *   startDate?: string,
     * }|InboxListCasFilesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<InboxListCasFilesResponse>
     *
     * @throws APIException
     */
    public function listCasFiles(
        array|InboxListCasFilesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = InboxListCasFilesParams::parseRequest(
            $params,
            $requestOptions,
        );
        $header_params = ['xInboxToken' => 'x-inbox-token'];

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'v4/inbox/cas',
            headers: Util::array_transform_keys(
                array_intersect_key($parsed, array_flip(array_keys($header_params))),
                $header_params,
            ),
            body: (object) array_diff_key(
                $parsed,
                array_flip(array_keys($header_params))
            ),
            options: $options,
            convert: InboxListCasFilesResponse::class,
        );
    }
}
