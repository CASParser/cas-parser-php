<?php

declare(strict_types=1);

namespace CasParser\CasGenerator\CasGeneratorGenerateCasParams;

/**
 * CAS authority to generate the document from (currently only kfintech is supported).
 */
enum CasAuthority: string
{
    case KFINTECH = 'kfintech';

    case CAMS = 'cams';

    case CDSL = 'cdsl';

    case NSDL = 'nsdl';
}
