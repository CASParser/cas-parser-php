<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse\MutualFund\Scheme;

use CasParser\Core\Attributes\Api;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type TransactionShape = array{
 *   amount?: float,
 *   balance?: float,
 *   date?: \DateTimeInterface,
 *   description?: string,
 *   dividendRate?: float,
 *   nav?: float,
 *   type?: string,
 *   units?: float,
 * }
 */
final class Transaction implements BaseModel
{
    /** @use SdkModel<TransactionShape> */
    use SdkModel;

    /**
     * Transaction amount.
     */
    #[Api(optional: true)]
    public ?float $amount;

    /**
     * Balance units after transaction.
     */
    #[Api(optional: true)]
    public ?float $balance;

    /**
     * Transaction date.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $date;

    /**
     * Transaction description.
     */
    #[Api(optional: true)]
    public ?string $description;

    /**
     * Dividend rate (for dividend transactions).
     */
    #[Api('dividend_rate', optional: true)]
    public ?float $dividendRate;

    /**
     * NAV on transaction date.
     */
    #[Api(optional: true)]
    public ?float $nav;

    /**
     * Transaction type detected based on description. Possible values are PURCHASE,PURCHASE_SIP,REDEMPTION,SWITCH_IN,SWITCH_IN_MERGER,SWITCH_OUT,SWITCH_OUT_MERGER,DIVIDEND_PAYOUT,DIVIDEND_REINVESTMENT,SEGREGATION,STAMP_DUTY_TAX,TDS_TAX,STT_TAX,MISC. If dividend_rate is present, then possible values are dividend_rate is applicable only for DIVIDEND_PAYOUT and DIVIDEND_REINVESTMENT.
     */
    #[Api(optional: true)]
    public ?string $type;

    /**
     * Number of units involved.
     */
    #[Api(optional: true)]
    public ?float $units;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?float $amount = null,
        ?float $balance = null,
        ?\DateTimeInterface $date = null,
        ?string $description = null,
        ?float $dividendRate = null,
        ?float $nav = null,
        ?string $type = null,
        ?float $units = null,
    ): self {
        $obj = new self;

        null !== $amount && $obj->amount = $amount;
        null !== $balance && $obj->balance = $balance;
        null !== $date && $obj->date = $date;
        null !== $description && $obj->description = $description;
        null !== $dividendRate && $obj->dividendRate = $dividendRate;
        null !== $nav && $obj->nav = $nav;
        null !== $type && $obj->type = $type;
        null !== $units && $obj->units = $units;

        return $obj;
    }

    /**
     * Transaction amount.
     */
    public function withAmount(float $amount): self
    {
        $obj = clone $this;
        $obj->amount = $amount;

        return $obj;
    }

    /**
     * Balance units after transaction.
     */
    public function withBalance(float $balance): self
    {
        $obj = clone $this;
        $obj->balance = $balance;

        return $obj;
    }

    /**
     * Transaction date.
     */
    public function withDate(\DateTimeInterface $date): self
    {
        $obj = clone $this;
        $obj->date = $date;

        return $obj;
    }

    /**
     * Transaction description.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    /**
     * Dividend rate (for dividend transactions).
     */
    public function withDividendRate(float $dividendRate): self
    {
        $obj = clone $this;
        $obj->dividendRate = $dividendRate;

        return $obj;
    }

    /**
     * NAV on transaction date.
     */
    public function withNav(float $nav): self
    {
        $obj = clone $this;
        $obj->nav = $nav;

        return $obj;
    }

    /**
     * Transaction type detected based on description. Possible values are PURCHASE,PURCHASE_SIP,REDEMPTION,SWITCH_IN,SWITCH_IN_MERGER,SWITCH_OUT,SWITCH_OUT_MERGER,DIVIDEND_PAYOUT,DIVIDEND_REINVESTMENT,SEGREGATION,STAMP_DUTY_TAX,TDS_TAX,STT_TAX,MISC. If dividend_rate is present, then possible values are dividend_rate is applicable only for DIVIDEND_PAYOUT and DIVIDEND_REINVESTMENT.
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj->type = $type;

        return $obj;
    }

    /**
     * Number of units involved.
     */
    public function withUnits(float $units): self
    {
        $obj = clone $this;
        $obj->units = $units;

        return $obj;
    }
}
