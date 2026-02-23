<?php

declare(strict_types=1);

namespace CasParser\InboundEmail\InboundEmailListParams;

/**
 * Filter by status.
 */
enum Status: string
{
    case ACTIVE = 'active';

    case PAUSED = 'paused';

    case ALL = 'all';
}
