<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse\MutualFund\Scheme;

use CasParser\CasParser\UnifiedResponse\MutualFund\Scheme\Transaction\AdditionalInfo;
use CasParser\CasParser\UnifiedResponse\MutualFund\Scheme\Transaction\Type;
use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * Unified transaction schema for all holding types (MF folios, equities, bonds, etc.).
 *
 * @phpstan-import-type AdditionalInfoShape from \CasParser\CasParser\UnifiedResponse\MutualFund\Scheme\Transaction\AdditionalInfo
 *
 * @phpstan-type TransactionShape = array{
 *   additionalInfo?: null|\CasParser\CasParser\UnifiedResponse\MutualFund\Scheme\Transaction\AdditionalInfo|AdditionalInfoShape,
 *   amount?: float|null,
 *   balance?: float|null,
 *   date?: string|null,
 *   description?: string|null,
 *   dividendRate?: float|null,
 *   nav?: float|null,
 *   type?: null|\CasParser\CasParser\UnifiedResponse\MutualFund\Scheme\Transaction\Type|value-of<\CasParser\CasParser\UnifiedResponse\MutualFund\Scheme\Transaction\Type>,
 *   units?: float|null,
 * }
 */
final class Transaction implements BaseModel
{
    /** @use SdkModel<TransactionShape> */
    use SdkModel;

    /**
     * Additional transaction-specific fields that vary by source.
     */
    #[Optional('additional_info')]
    public ?AdditionalInfo $additionalInfo;

    /**
     * Transaction amount in currency (computed from units × price/NAV).
     */
    #[Optional(nullable: true)]
    public ?float $amount;

    /**
     * Balance units after transaction.
     */
    #[Optional]
    public ?float $balance;

    /**
     * Transaction date (YYYY-MM-DD).
     */
    #[Optional]
    public ?string $date;

    /**
     * Transaction description/particulars.
     */
    #[Optional]
    public ?string $description;

    /**
     * Dividend rate (for DIVIDEND_PAYOUT transactions).
     */
    #[Optional('dividend_rate', nullable: true)]
    public ?float $dividendRate;

    /**
     * NAV/price per unit on transaction date.
     */
    #[Optional(nullable: true)]
    public ?float $nav;

    /**
     * Transaction type. Possible values are PURCHASE, PURCHASE_SIP, REDEMPTION, SWITCH_IN, SWITCH_IN_MERGER, SWITCH_OUT, SWITCH_OUT_MERGER, DIVIDEND_PAYOUT, DIVIDEND_REINVEST, SEGREGATION, STAMP_DUTY_TAX, TDS_TAX, STT_TAX, MISC, REVERSAL, UNKNOWN.
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(
        enum: Type::class,
    )]
    public ?string $type;

    /**
     * Number of units involved in transaction.
     */
    #[Optional]
    public ?float $units;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param AdditionalInfo|AdditionalInfoShape|null $additionalInfo
     * @param Type|value-of<Type>|null $type
     */
    public static function with(
        AdditionalInfo|array|null $additionalInfo = null,
        ?float $amount = null,
        ?float $balance = null,
        ?string $date = null,
        ?string $description = null,
        ?float $dividendRate = null,
        ?float $nav = null,
        Type|string|null $type = null,
        ?float $units = null,
    ): self {
        $self = new self;

        null !== $additionalInfo && $self['additionalInfo'] = $additionalInfo;
        null !== $amount && $self['amount'] = $amount;
        null !== $balance && $self['balance'] = $balance;
        null !== $date && $self['date'] = $date;
        null !== $description && $self['description'] = $description;
        null !== $dividendRate && $self['dividendRate'] = $dividendRate;
        null !== $nav && $self['nav'] = $nav;
        null !== $type && $self['type'] = $type;
        null !== $units && $self['units'] = $units;

        return $self;
    }

    /**
     * Additional transaction-specific fields that vary by source.
     *
     * @param AdditionalInfo|AdditionalInfoShape $additionalInfo
     */
    public function withAdditionalInfo(
        AdditionalInfo|array $additionalInfo,
    ): self {
        $self = clone $this;
        $self['additionalInfo'] = $additionalInfo;

        return $self;
    }

    /**
     * Transaction amount in currency (computed from units × price/NAV).
     */
    public function withAmount(?float $amount): self
    {
        $self = clone $this;
        $self['amount'] = $amount;

        return $self;
    }

    /**
     * Balance units after transaction.
     */
    public function withBalance(float $balance): self
    {
        $self = clone $this;
        $self['balance'] = $balance;

        return $self;
    }

    /**
     * Transaction date (YYYY-MM-DD).
     */
    public function withDate(string $date): self
    {
        $self = clone $this;
        $self['date'] = $date;

        return $self;
    }

    /**
     * Transaction description/particulars.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * Dividend rate (for DIVIDEND_PAYOUT transactions).
     */
    public function withDividendRate(?float $dividendRate): self
    {
        $self = clone $this;
        $self['dividendRate'] = $dividendRate;

        return $self;
    }

    /**
     * NAV/price per unit on transaction date.
     */
    public function withNav(?float $nav): self
    {
        $self = clone $this;
        $self['nav'] = $nav;

        return $self;
    }

    /**
     * Transaction type. Possible values are PURCHASE, PURCHASE_SIP, REDEMPTION, SWITCH_IN, SWITCH_IN_MERGER, SWITCH_OUT, SWITCH_OUT_MERGER, DIVIDEND_PAYOUT, DIVIDEND_REINVEST, SEGREGATION, STAMP_DUTY_TAX, TDS_TAX, STT_TAX, MISC, REVERSAL, UNKNOWN.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(
        Type|string $type,
    ): self {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Number of units involved in transaction.
     */
    public function withUnits(float $units): self
    {
        $self = clone $this;
        $self['units'] = $units;

        return $self;
    }
}
