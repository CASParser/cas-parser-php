<?php

declare(strict_types=1);

namespace CasParser\CamsKfintech\UnifiedResponse\Meta;

/**
 * Type of CAS detected and processed.
 */
enum CasType: string
{
    case NSDL = 'NSDL';

    case CDSL = 'CDSL';

    case CAMS_KFINTECH = 'CAMS_KFINTECH';
}
