<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse\MutualFund\Scheme;

/**
 * Type of mutual fund scheme.
 */
enum Type: string
{
    case EQUITY = 'Equity';

    case DEBT = 'Debt';

    case HYBRID = 'Hybrid';

    case OTHER = 'Other';
}
