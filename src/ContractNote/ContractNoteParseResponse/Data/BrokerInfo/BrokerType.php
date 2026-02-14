<?php

declare(strict_types=1);

namespace CasParser\ContractNote\ContractNoteParseResponse\Data\BrokerInfo;

/**
 * Auto-detected or specified broker type.
 */
enum BrokerType: string
{
    case ZERODHA = 'zerodha';

    case GROWW = 'groww';

    case UPSTOX = 'upstox';

    case ICICI = 'icici';

    case UNKNOWN = 'unknown';
}
