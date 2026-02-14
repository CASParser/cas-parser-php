<?php

declare(strict_types=1);

namespace CasParser\ContractNote\ContractNoteParseParams;

/**
 * Optional broker type override. If not provided, system will auto-detect.
 */
enum BrokerType: string
{
    case ZERODHA = 'zerodha';

    case GROWW = 'groww';

    case UPSTOX = 'upstox';

    case ICICI = 'icici';
}
