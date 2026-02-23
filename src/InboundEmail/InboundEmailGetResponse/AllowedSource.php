<?php

declare(strict_types=1);

namespace CasParser\InboundEmail\InboundEmailGetResponse;

enum AllowedSource: string
{
    case CDSL = 'cdsl';

    case NSDL = 'nsdl';

    case CAMS = 'cams';

    case KFINTECH = 'kfintech';
}
