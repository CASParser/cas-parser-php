<?php

declare(strict_types=1);

namespace CasParser\Inbox\InboxListCasFilesResponse\File;

/**
 * Detected CAS provider based on sender email.
 */
enum CasType: string
{
    case CDSL = 'cdsl';

    case NSDL = 'nsdl';

    case CAMS = 'cams';

    case KFINTECH = 'kfintech';
}
