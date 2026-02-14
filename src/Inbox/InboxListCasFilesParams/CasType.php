<?php

declare(strict_types=1);

namespace CasParser\Inbox\InboxListCasFilesParams;

enum CasType: string
{
    case CDSL = 'cdsl';

    case NSDL = 'nsdl';

    case CAMS = 'cams';

    case KFINTECH = 'kfintech';
}
