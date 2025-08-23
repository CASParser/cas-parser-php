<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse\MutualFund\Scheme;

use CasParser\Core\Concerns\SdkEnum;
use CasParser\Core\Conversion\Contracts\ConverterSource;

/**
 * Type of mutual fund scheme.
 */
final class Type implements ConverterSource
{
    use SdkEnum;

    public const EQUITY = 'Equity';

    public const DEBT = 'Debt';

    public const HYBRID = 'Hybrid';

    public const OTHER = 'Other';
}
