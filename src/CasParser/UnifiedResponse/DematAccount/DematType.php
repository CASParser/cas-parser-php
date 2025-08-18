<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse\DematAccount;

use CasParser\Core\Concerns\Enum;
use CasParser\Core\Conversion\Contracts\ConverterSource;

/**
 * Type of demat account.
 *
 * @phpstan-type demat_type_alias = DematType::*
 */
final class DematType implements ConverterSource
{
    use Enum;

    public const NSDL = 'NSDL';

    public const CDSL = 'CDSL';
}
