<?php

declare(strict_types=1);

namespace CasParser\InboundEmail\InboundEmailGetResponse;

/**
 * Current mailbox status.
 */
enum Status: string
{
    case ACTIVE = 'active';

    case PAUSED = 'paused';
}
