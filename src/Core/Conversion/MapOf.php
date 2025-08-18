<?php

declare(strict_types=1);

namespace CasParser\Core\Conversion;

use CasParser\Core\Conversion\Concerns\ArrayOf;
use CasParser\Core\Conversion\Contracts\Converter;

/**
 * @internal
 */
final class MapOf implements Converter
{
    use ArrayOf;
}
