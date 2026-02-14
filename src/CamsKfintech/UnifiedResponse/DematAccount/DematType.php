<?php

declare(strict_types=1);

namespace CasParser\CamsKfintech\UnifiedResponse\DematAccount;

/**
 * Type of demat account.
 */
enum DematType: string
{
    case NSDL = 'NSDL';

    case CDSL = 'CDSL';
}
