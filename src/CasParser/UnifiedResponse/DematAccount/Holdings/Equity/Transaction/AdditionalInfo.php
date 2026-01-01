<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse\DematAccount\Holdings\Equity\Transaction;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * Additional transaction-specific fields that vary by source.
 *
 * @phpstan-type AdditionalInfoShape = array{
 *   capitalWithdrawal?: float|null,
 *   credit?: float|null,
 *   debit?: float|null,
 *   incomeDistribution?: float|null,
 *   orderNo?: string|null,
 *   price?: float|null,
 *   stampDuty?: float|null,
 * }
 */
final class AdditionalInfo implements BaseModel
{
    /** @use SdkModel<AdditionalInfoShape> */
    use SdkModel;

    /**
     * Capital withdrawal amount (CDSL MF transactions).
     */
    #[Optional('capital_withdrawal')]
    public ?float $capitalWithdrawal;

    /**
     * Units credited (demat transactions).
     */
    #[Optional]
    public ?float $credit;

    /**
     * Units debited (demat transactions).
     */
    #[Optional]
    public ?float $debit;

    /**
     * Income distribution amount (CDSL MF transactions).
     */
    #[Optional('income_distribution')]
    public ?float $incomeDistribution;

    /**
     * Order/transaction reference number (demat transactions).
     */
    #[Optional('order_no')]
    public ?string $orderNo;

    /**
     * Price per unit (NSDL/CDSL MF transactions).
     */
    #[Optional]
    public ?float $price;

    /**
     * Stamp duty charged.
     */
    #[Optional('stamp_duty')]
    public ?float $stampDuty;

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
        ?float $capitalWithdrawal = null,
        ?float $credit = null,
        ?float $debit = null,
        ?float $incomeDistribution = null,
        ?string $orderNo = null,
        ?float $price = null,
        ?float $stampDuty = null,
    ): self {
        $self = new self;

        null !== $capitalWithdrawal && $self['capitalWithdrawal'] = $capitalWithdrawal;
        null !== $credit && $self['credit'] = $credit;
        null !== $debit && $self['debit'] = $debit;
        null !== $incomeDistribution && $self['incomeDistribution'] = $incomeDistribution;
        null !== $orderNo && $self['orderNo'] = $orderNo;
        null !== $price && $self['price'] = $price;
        null !== $stampDuty && $self['stampDuty'] = $stampDuty;

        return $self;
    }

    /**
     * Capital withdrawal amount (CDSL MF transactions).
     */
    public function withCapitalWithdrawal(float $capitalWithdrawal): self
    {
        $self = clone $this;
        $self['capitalWithdrawal'] = $capitalWithdrawal;

        return $self;
    }

    /**
     * Units credited (demat transactions).
     */
    public function withCredit(float $credit): self
    {
        $self = clone $this;
        $self['credit'] = $credit;

        return $self;
    }

    /**
     * Units debited (demat transactions).
     */
    public function withDebit(float $debit): self
    {
        $self = clone $this;
        $self['debit'] = $debit;

        return $self;
    }

    /**
     * Income distribution amount (CDSL MF transactions).
     */
    public function withIncomeDistribution(float $incomeDistribution): self
    {
        $self = clone $this;
        $self['incomeDistribution'] = $incomeDistribution;

        return $self;
    }

    /**
     * Order/transaction reference number (demat transactions).
     */
    public function withOrderNo(string $orderNo): self
    {
        $self = clone $this;
        $self['orderNo'] = $orderNo;

        return $self;
    }

    /**
     * Price per unit (NSDL/CDSL MF transactions).
     */
    public function withPrice(float $price): self
    {
        $self = clone $this;
        $self['price'] = $price;

        return $self;
    }

    /**
     * Stamp duty charged.
     */
    public function withStampDuty(float $stampDuty): self
    {
        $self = clone $this;
        $self['stampDuty'] = $stampDuty;

        return $self;
    }
}
