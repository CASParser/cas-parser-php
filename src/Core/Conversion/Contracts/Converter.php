<?php

declare(strict_types=1);

namespace CasParser\Core\Conversion\Contracts;

use CasParser\Core\Conversion\CoerceState;
use CasParser\Core\Conversion\DumpState;

/**
 * @internal
 */
interface Converter
{
    /**
     * @internal
     */
    public function coerce(mixed $value, CoerceState $state): mixed;

    /**
     * @internal
     */
    public function dump(mixed $value, DumpState $state): mixed;
}
