<?php

declare(strict_types=1);

namespace CasParser\ServiceContracts;

use CasParser\Core\Exceptions\APIException;
use CasParser\Inbox\InboxCheckConnectionStatusResponse;
use CasParser\Inbox\InboxConnectEmailParams\Provider;
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
     * @param Provider|value-of<Provider> $provider Mail provider to connect. Defaults to `gmail`.
     *
     * - `gmail` - Google accounts: `@gmail.com` and Google
     *   Workspace domains.
     * - `outlook` - personal Microsoft accounts: `@outlook.com`,
     *   `@hotmail.com`, `@live.com`, `@msn.com` and localised
     *   variants (`@hotmail.co.uk`, `@live.in`, `@hotmail.fr`).
     *   Any other address registered as a personal Microsoft
     *   account also works, including custom domains.
     * - `zoho` - Zoho Mail accounts, including custom domains
     *   hosted on Zoho.
     *
     * Any unrecognised value is treated as `gmail`. The resolved
     * provider is returned in the response.
     * @param string $state State parameter for CSRF protection (returned in redirect)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function connectEmail(
        string $redirectUri,
        Provider|string $provider = 'gmail',
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
