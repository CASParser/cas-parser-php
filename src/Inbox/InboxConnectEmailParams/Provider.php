<?php

declare(strict_types=1);

namespace CasParser\Inbox\InboxConnectEmailParams;

/**
 * Mail provider to connect. Defaults to `gmail`.
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
 */
enum Provider: string
{
    case GMAIL = 'gmail';

    case OUTLOOK = 'outlook';

    case ZOHO = 'zoho';
}
