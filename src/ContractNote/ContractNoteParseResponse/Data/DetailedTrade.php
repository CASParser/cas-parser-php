<?php

declare(strict_types=1);

namespace CasParser\ContractNote\ContractNoteParseResponse\Data;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type DetailedTradeShape = array{
 *   brokerage?: float|null,
 *   buySell?: string|null,
 *   closingRatePerUnit?: float|null,
 *   exchange?: string|null,
 *   netRatePerUnit?: float|null,
 *   netTotal?: float|null,
 *   orderNumber?: string|null,
 *   orderTime?: string|null,
 *   quantity?: float|null,
 *   remarks?: string|null,
 *   securityDescription?: string|null,
 *   tradeNumber?: string|null,
 *   tradeTime?: string|null,
 * }
 */
final class DetailedTrade implements BaseModel
{
    /** @use SdkModel<DetailedTradeShape> */
    use SdkModel;

    /**
     * Brokerage charged for this trade.
     */
    #[Optional]
    public ?float $brokerage;

    /**
     * Transaction type (B for Buy, S for Sell).
     */
    #[Optional('buy_sell')]
    public ?string $buySell;

    /**
     * Closing rate per unit.
     */
    #[Optional('closing_rate_per_unit')]
    public ?float $closingRatePerUnit;

    /**
     * Exchange name.
     */
    #[Optional]
    public ?string $exchange;

    /**
     * Net rate per unit.
     */
    #[Optional('net_rate_per_unit')]
    public ?float $netRatePerUnit;

    /**
     * Net total for this trade.
     */
    #[Optional('net_total')]
    public ?float $netTotal;

    /**
     * Order reference number.
     */
    #[Optional('order_number')]
    public ?string $orderNumber;

    /**
     * Time when order was placed.
     */
    #[Optional('order_time')]
    public ?string $orderTime;

    /**
     * Quantity traded.
     */
    #[Optional]
    public ?float $quantity;

    /**
     * Additional remarks or notes.
     */
    #[Optional]
    public ?string $remarks;

    /**
     * Security name with exchange and ISIN.
     */
    #[Optional('security_description')]
    public ?string $securityDescription;

    /**
     * Trade reference number.
     */
    #[Optional('trade_number')]
    public ?string $tradeNumber;

    /**
     * Time when trade was executed.
     */
    #[Optional('trade_time')]
    public ?string $tradeTime;

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
        ?float $brokerage = null,
        ?string $buySell = null,
        ?float $closingRatePerUnit = null,
        ?string $exchange = null,
        ?float $netRatePerUnit = null,
        ?float $netTotal = null,
        ?string $orderNumber = null,
        ?string $orderTime = null,
        ?float $quantity = null,
        ?string $remarks = null,
        ?string $securityDescription = null,
        ?string $tradeNumber = null,
        ?string $tradeTime = null,
    ): self {
        $self = new self;

        null !== $brokerage && $self['brokerage'] = $brokerage;
        null !== $buySell && $self['buySell'] = $buySell;
        null !== $closingRatePerUnit && $self['closingRatePerUnit'] = $closingRatePerUnit;
        null !== $exchange && $self['exchange'] = $exchange;
        null !== $netRatePerUnit && $self['netRatePerUnit'] = $netRatePerUnit;
        null !== $netTotal && $self['netTotal'] = $netTotal;
        null !== $orderNumber && $self['orderNumber'] = $orderNumber;
        null !== $orderTime && $self['orderTime'] = $orderTime;
        null !== $quantity && $self['quantity'] = $quantity;
        null !== $remarks && $self['remarks'] = $remarks;
        null !== $securityDescription && $self['securityDescription'] = $securityDescription;
        null !== $tradeNumber && $self['tradeNumber'] = $tradeNumber;
        null !== $tradeTime && $self['tradeTime'] = $tradeTime;

        return $self;
    }

    /**
     * Brokerage charged for this trade.
     */
    public function withBrokerage(float $brokerage): self
    {
        $self = clone $this;
        $self['brokerage'] = $brokerage;

        return $self;
    }

    /**
     * Transaction type (B for Buy, S for Sell).
     */
    public function withBuySell(string $buySell): self
    {
        $self = clone $this;
        $self['buySell'] = $buySell;

        return $self;
    }

    /**
     * Closing rate per unit.
     */
    public function withClosingRatePerUnit(float $closingRatePerUnit): self
    {
        $self = clone $this;
        $self['closingRatePerUnit'] = $closingRatePerUnit;

        return $self;
    }

    /**
     * Exchange name.
     */
    public function withExchange(string $exchange): self
    {
        $self = clone $this;
        $self['exchange'] = $exchange;

        return $self;
    }

    /**
     * Net rate per unit.
     */
    public function withNetRatePerUnit(float $netRatePerUnit): self
    {
        $self = clone $this;
        $self['netRatePerUnit'] = $netRatePerUnit;

        return $self;
    }

    /**
     * Net total for this trade.
     */
    public function withNetTotal(float $netTotal): self
    {
        $self = clone $this;
        $self['netTotal'] = $netTotal;

        return $self;
    }

    /**
     * Order reference number.
     */
    public function withOrderNumber(string $orderNumber): self
    {
        $self = clone $this;
        $self['orderNumber'] = $orderNumber;

        return $self;
    }

    /**
     * Time when order was placed.
     */
    public function withOrderTime(string $orderTime): self
    {
        $self = clone $this;
        $self['orderTime'] = $orderTime;

        return $self;
    }

    /**
     * Quantity traded.
     */
    public function withQuantity(float $quantity): self
    {
        $self = clone $this;
        $self['quantity'] = $quantity;

        return $self;
    }

    /**
     * Additional remarks or notes.
     */
    public function withRemarks(string $remarks): self
    {
        $self = clone $this;
        $self['remarks'] = $remarks;

        return $self;
    }

    /**
     * Security name with exchange and ISIN.
     */
    public function withSecurityDescription(string $securityDescription): self
    {
        $self = clone $this;
        $self['securityDescription'] = $securityDescription;

        return $self;
    }

    /**
     * Trade reference number.
     */
    public function withTradeNumber(string $tradeNumber): self
    {
        $self = clone $this;
        $self['tradeNumber'] = $tradeNumber;

        return $self;
    }

    /**
     * Time when trade was executed.
     */
    public function withTradeTime(string $tradeTime): self
    {
        $self = clone $this;
        $self['tradeTime'] = $tradeTime;

        return $self;
    }
}
