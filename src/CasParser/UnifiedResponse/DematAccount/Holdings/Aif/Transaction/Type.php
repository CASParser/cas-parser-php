<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse\DematAccount\Holdings\Aif\Transaction;

/**
 * Transaction type. Possible values are PURCHASE, PURCHASE_SIP, REDEMPTION, SWITCH_IN, SWITCH_IN_MERGER, SWITCH_OUT, SWITCH_OUT_MERGER, DIVIDEND_PAYOUT, DIVIDEND_REINVEST, SEGREGATION, STAMP_DUTY_TAX, TDS_TAX, STT_TAX, MISC, REVERSAL, UNKNOWN.
 */
enum Type: string
{
    case PURCHASE = 'PURCHASE';

    case PURCHASE_SIP = 'PURCHASE_SIP';

    case REDEMPTION = 'REDEMPTION';

    case SWITCH_IN = 'SWITCH_IN';

    case SWITCH_IN_MERGER = 'SWITCH_IN_MERGER';

    case SWITCH_OUT = 'SWITCH_OUT';

    case SWITCH_OUT_MERGER = 'SWITCH_OUT_MERGER';

    case DIVIDEND_PAYOUT = 'DIVIDEND_PAYOUT';

    case DIVIDEND_REINVEST = 'DIVIDEND_REINVEST';

    case SEGREGATION = 'SEGREGATION';

    case STAMP_DUTY_TAX = 'STAMP_DUTY_TAX';

    case TDS_TAX = 'TDS_TAX';

    case STT_TAX = 'STT_TAX';

    case MISC = 'MISC';

    case REVERSAL = 'REVERSAL';

    case UNKNOWN = 'UNKNOWN';
}
