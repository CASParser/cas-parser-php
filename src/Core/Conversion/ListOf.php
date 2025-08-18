<?php

declare(strict_types=1);

namespace CasParser\Core\Conversion;

use CasParser\Core\Conversion\Concerns\ArrayOf;
use CasParser\Core\Conversion\Contracts\Converter;

/**
 * @internal
 */
final class ListOf implements Converter
{
    use ArrayOf;

    private function empty(): array|object // @phpstan-ignore-line
    {
        return [];
    }
}
