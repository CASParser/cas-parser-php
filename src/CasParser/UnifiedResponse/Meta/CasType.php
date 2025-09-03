<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse\Meta;

use CasParser\Core\Concerns\SdkEnum;
use CasParser\Core\Conversion\Contracts\ConverterSource;

/**
 * Type of CAS detected and processed.
 */
final class CasType implements ConverterSource
{
    use SdkEnum;

    public const NSDL = 'NSDL';

    public const CDSL = 'CDSL';

    public const CAMS_KFINTECH = 'CAMS_KFINTECH';
}
