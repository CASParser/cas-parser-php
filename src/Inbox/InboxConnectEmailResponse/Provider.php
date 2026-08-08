<?php

declare(strict_types=1);

namespace CasParser\Inbox\InboxConnectEmailResponse;

/**
 * The provider this OAuth URL was generated for.
 */
enum Provider: string
{
    case GMAIL = 'gmail';

    case OUTLOOK = 'outlook';
}
