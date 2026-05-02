<?php

declare(strict_types=1);

namespace CasParser\InboundEmail\InboundEmailListResponse\InboundEmail;

/**
 * Current inbound email lifecycle status.
 */
enum Status: string
{
    case ACTIVE = 'active';

    case PAUSED = 'paused';
}
