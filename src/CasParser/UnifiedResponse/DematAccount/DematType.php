<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse\DematAccount;

use CasParser\Core\Concerns\SdkEnum;
use CasParser\Core\Conversion\Contracts\ConverterSource;

/**
 * Type of demat account.
 */
final class DematType implements ConverterSource
{
    use SdkEnum;

    public const NSDL = 'NSDL';

    public const CDSL = 'CDSL';
}
