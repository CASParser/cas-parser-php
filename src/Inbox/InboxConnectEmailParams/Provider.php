<?php

declare(strict_types=1);

namespace CasParser\Inbox\InboxConnectEmailParams;

/**
 * Mail provider to connect. Defaults to `gmail`.
 *
 * - `gmail` - Google accounts
 * - `outlook` - Microsoft accounts
 *
 * Any value other than `outlook` is treated as `gmail`. The
 * resolved provider is returned in the response.
 */
enum Provider: string
{
    case GMAIL = 'gmail';

    case OUTLOOK = 'outlook';
}
