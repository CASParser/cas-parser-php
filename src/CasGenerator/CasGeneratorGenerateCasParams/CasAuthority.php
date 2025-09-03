<?php

declare(strict_types=1);

namespace CasParser\CasGenerator\CasGeneratorGenerateCasParams;

use CasParser\Core\Concerns\SdkEnum;
use CasParser\Core\Conversion\Contracts\ConverterSource;

/**
 * CAS authority to generate the document from (currently only kfintech is supported).
 */
final class CasAuthority implements ConverterSource
{
    use SdkEnum;

    public const KFINTECH = 'kfintech';

    public const CAMS = 'cams';

    public const CDSL = 'cdsl';

    public const NSDL = 'nsdl';
}
