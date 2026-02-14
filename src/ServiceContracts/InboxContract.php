<?php

declare(strict_types=1);

namespace CasParser\ServiceContracts;

use CasParser\Core\Exceptions\APIException;
use CasParser\Inbox\InboxCheckConnectionStatusResponse;
use CasParser\Inbox\InboxConnectEmailResponse;
use CasParser\Inbox\InboxDisconnectEmailResponse;
use CasParser\Inbox\InboxListCasFilesParams\CasType;
use CasParser\Inbox\InboxListCasFilesResponse;
use CasParser\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \CasParser\RequestOptions
 */
interface InboxContract
{
    /**
     * @api
     *
     * @param string $xInboxToken The encrypted inbox token
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function checkConnectionStatus(
        string $xInboxToken,
        RequestOptions|array|null $requestOptions = null
    ): InboxCheckConnectionStatusResponse;

    /**
     * @api
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
    ): InboxConnectEmailResponse;

    /**
     * @api
     *
     * @param string $xInboxToken The encrypted inbox token to revoke
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function disconnectEmail(
        string $xInboxToken,
        RequestOptions|array|null $requestOptions = null
    ): InboxDisconnectEmailResponse;

    /**
     * @api
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
    ): InboxListCasFilesResponse;
}
