<?php

declare(strict_types=1);

namespace CasParser\ContractNote\ContractNoteParseResponse\Data;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type DerivativesTransactionShape = array{
 *   brokeragePerUnit?: float|null,
 *   buySellBfCf?: string|null,
 *   closingRatePerUnit?: float|null,
 *   contractDescription?: string|null,
 *   netTotal?: float|null,
 *   quantity?: float|null,
 *   wapPerUnit?: float|null,
 * }
 */
final class DerivativesTransaction implements BaseModel
{
    /** @use SdkModel<DerivativesTransactionShape> */
    use SdkModel;

    /**
     * Brokerage charged per unit.
     */
    #[Optional('brokerage_per_unit')]
    public ?float $brokeragePerUnit;

    /**
     * Transaction type (Buy/Sell/Bring Forward/Carry Forward).
     */
    #[Optional('buy_sell_bf_cf')]
    public ?string $buySellBfCf;

    /**
     * Closing rate per unit.
     */
    #[Optional('closing_rate_per_unit')]
    public ?float $closingRatePerUnit;

    /**
     * Derivatives contract description.
     */
    #[Optional('contract_description')]
    public ?string $contractDescription;

    /**
     * Net total amount.
     */
    #[Optional('net_total')]
    public ?float $netTotal;

    /**
     * Quantity traded.
     */
    #[Optional]
    public ?float $quantity;

    /**
     * Weighted Average Price per unit.
     */
    #[Optional('wap_per_unit')]
    public ?float $wapPerUnit;

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
        ?float $brokeragePerUnit = null,
        ?string $buySellBfCf = null,
        ?float $closingRatePerUnit = null,
        ?string $contractDescription = null,
        ?float $netTotal = null,
        ?float $quantity = null,
        ?float $wapPerUnit = null,
    ): self {
        $self = new self;

        null !== $brokeragePerUnit && $self['brokeragePerUnit'] = $brokeragePerUnit;
        null !== $buySellBfCf && $self['buySellBfCf'] = $buySellBfCf;
        null !== $closingRatePerUnit && $self['closingRatePerUnit'] = $closingRatePerUnit;
        null !== $contractDescription && $self['contractDescription'] = $contractDescription;
        null !== $netTotal && $self['netTotal'] = $netTotal;
        null !== $quantity && $self['quantity'] = $quantity;
        null !== $wapPerUnit && $self['wapPerUnit'] = $wapPerUnit;

        return $self;
    }

    /**
     * Brokerage charged per unit.
     */
    public function withBrokeragePerUnit(float $brokeragePerUnit): self
    {
        $self = clone $this;
        $self['brokeragePerUnit'] = $brokeragePerUnit;

        return $self;
    }

    /**
     * Transaction type (Buy/Sell/Bring Forward/Carry Forward).
     */
    public function withBuySellBfCf(string $buySellBfCf): self
    {
        $self = clone $this;
        $self['buySellBfCf'] = $buySellBfCf;

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
     * Derivatives contract description.
     */
    public function withContractDescription(string $contractDescription): self
    {
        $self = clone $this;
        $self['contractDescription'] = $contractDescription;

        return $self;
    }

    /**
     * Net total amount.
     */
    public function withNetTotal(float $netTotal): self
    {
        $self = clone $this;
        $self['netTotal'] = $netTotal;

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
     * Weighted Average Price per unit.
     */
    public function withWapPerUnit(float $wapPerUnit): self
    {
        $self = clone $this;
        $self['wapPerUnit'] = $wapPerUnit;

        return $self;
    }
}
