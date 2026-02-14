<?php

declare(strict_types=1);

namespace CasParser\Services;

use CasParser\Client;
use CasParser\Core\Exceptions\APIException;
use CasParser\Core\Util;
use CasParser\Inbox\InboxCheckConnectionStatusResponse;
use CasParser\Inbox\InboxConnectEmailResponse;
use CasParser\Inbox\InboxDisconnectEmailResponse;
use CasParser\Inbox\InboxListCasFilesParams\CasType;
use CasParser\Inbox\InboxListCasFilesResponse;
use CasParser\RequestOptions;
use CasParser\ServiceContracts\InboxContract;

/**
 * @phpstan-import-type RequestOpts from \CasParser\RequestOptions
 */
final class InboxService implements InboxContract
{
    /**
     * @api
     */
    public InboxRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new InboxRawService($client);
    }

    /**
     * @api
     *
     * Verify if an `inbox_token` is still valid and check connection status.
     *
     * Use this to check if the user needs to re-authenticate (e.g., if they
     * revoked access in their email provider settings).
     *
     * @param string $xInboxToken The encrypted inbox token
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function checkConnectionStatus(
        string $xInboxToken,
        RequestOptions|array|null $requestOptions = null
    ): InboxCheckConnectionStatusResponse {
        $params = Util::removeNulls(['xInboxToken' => $xInboxToken]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->checkConnectionStatus(params: $params, requestOptions: $requestOptions);

        return $response->parse();
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
     * @param string $redirectUri Your callback URL to receive the inbox_token (must be http or https)
     * @param string $state State parameter for CSRF protection (returned in redirect)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function connectEmail(
        string $redirectUri,
        ?string $state = null,
        RequestOptions|array|null $requestOptions = null,
    ): InboxConnectEmailResponse {
        $params = Util::removeNulls(
            ['redirectUri' => $redirectUri, 'state' => $state]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->connectEmail(params: $params, requestOptions: $requestOptions);

        return $response->parse();
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
     * @param string $xInboxToken The encrypted inbox token to revoke
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function disconnectEmail(
        string $xInboxToken,
        RequestOptions|array|null $requestOptions = null
    ): InboxDisconnectEmailResponse {
        $params = Util::removeNulls(['xInboxToken' => $xInboxToken]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->disconnectEmail(params: $params, requestOptions: $requestOptions);

        return $response->parse();
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
     * @param string $xInboxToken Header param: The encrypted inbox token
     * @param list<CasType|value-of<CasType>> $casTypes Body param: Filter by CAS provider(s):
     * - `cdsl` → eCAS@cdslstatement.com
     * - `nsdl` → NSDL-CAS@nsdl.co.in
     * - `cams` → donotreply@camsonline.com
     * - `kfintech` → samfS@kfintech.com
     * @param string $endDate Body param: End date in ISO format (YYYY-MM-DD). Defaults to today.
     * @param string $startDate Body param: Start date in ISO format (YYYY-MM-DD). Defaults to 30 days ago.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listCasFiles(
        string $xInboxToken,
        ?array $casTypes = null,
        ?string $endDate = null,
        ?string $startDate = null,
        RequestOptions|array|null $requestOptions = null,
    ): InboxListCasFilesResponse {
        $params = Util::removeNulls(
            [
                'xInboxToken' => $xInboxToken,
                'casTypes' => $casTypes,
                'endDate' => $endDate,
                'startDate' => $startDate,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listCasFiles(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
