<?php

declare(strict_types=1);

namespace CasParser\ContractNote\ContractNoteParseResponse\Data;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type EquityTransactionShape = array{
 *   buyQuantity?: float|null,
 *   buyTotalValue?: float|null,
 *   buyWap?: float|null,
 *   isin?: string|null,
 *   netObligation?: float|null,
 *   securityName?: string|null,
 *   securitySymbol?: string|null,
 *   sellQuantity?: float|null,
 *   sellTotalValue?: float|null,
 *   sellWap?: float|null,
 * }
 */
final class EquityTransaction implements BaseModel
{
    /** @use SdkModel<EquityTransactionShape> */
    use SdkModel;

    /**
     * Total quantity purchased.
     */
    #[Optional('buy_quantity')]
    public ?float $buyQuantity;

    /**
     * Total value of buy transactions.
     */
    #[Optional('buy_total_value')]
    public ?float $buyTotalValue;

    /**
     * Weighted Average Price for buy transactions.
     */
    #[Optional('buy_wap')]
    public ?float $buyWap;

    /**
     * ISIN code of the security.
     */
    #[Optional]
    public ?string $isin;

    /**
     * Net amount payable/receivable for this security.
     */
    #[Optional('net_obligation')]
    public ?float $netObligation;

    /**
     * Name of the security.
     */
    #[Optional('security_name')]
    public ?string $securityName;

    /**
     * Trading symbol.
     */
    #[Optional('security_symbol')]
    public ?string $securitySymbol;

    /**
     * Total quantity sold.
     */
    #[Optional('sell_quantity')]
    public ?float $sellQuantity;

    /**
     * Total value of sell transactions.
     */
    #[Optional('sell_total_value')]
    public ?float $sellTotalValue;

    /**
     * Weighted Average Price for sell transactions.
     */
    #[Optional('sell_wap')]
    public ?float $sellWap;

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
        ?float $buyQuantity = null,
        ?float $buyTotalValue = null,
        ?float $buyWap = null,
        ?string $isin = null,
        ?float $netObligation = null,
        ?string $securityName = null,
        ?string $securitySymbol = null,
        ?float $sellQuantity = null,
        ?float $sellTotalValue = null,
        ?float $sellWap = null,
    ): self {
        $self = new self;

        null !== $buyQuantity && $self['buyQuantity'] = $buyQuantity;
        null !== $buyTotalValue && $self['buyTotalValue'] = $buyTotalValue;
        null !== $buyWap && $self['buyWap'] = $buyWap;
        null !== $isin && $self['isin'] = $isin;
        null !== $netObligation && $self['netObligation'] = $netObligation;
        null !== $securityName && $self['securityName'] = $securityName;
        null !== $securitySymbol && $self['securitySymbol'] = $securitySymbol;
        null !== $sellQuantity && $self['sellQuantity'] = $sellQuantity;
        null !== $sellTotalValue && $self['sellTotalValue'] = $sellTotalValue;
        null !== $sellWap && $self['sellWap'] = $sellWap;

        return $self;
    }

    /**
     * Total quantity purchased.
     */
    public function withBuyQuantity(float $buyQuantity): self
    {
        $self = clone $this;
        $self['buyQuantity'] = $buyQuantity;

        return $self;
    }

    /**
     * Total value of buy transactions.
     */
    public function withBuyTotalValue(float $buyTotalValue): self
    {
        $self = clone $this;
        $self['buyTotalValue'] = $buyTotalValue;

        return $self;
    }

    /**
     * Weighted Average Price for buy transactions.
     */
    public function withBuyWap(float $buyWap): self
    {
        $self = clone $this;
        $self['buyWap'] = $buyWap;

        return $self;
    }

    /**
     * ISIN code of the security.
     */
    public function withIsin(string $isin): self
    {
        $self = clone $this;
        $self['isin'] = $isin;

        return $self;
    }

    /**
     * Net amount payable/receivable for this security.
     */
    public function withNetObligation(float $netObligation): self
    {
        $self = clone $this;
        $self['netObligation'] = $netObligation;

        return $self;
    }

    /**
     * Name of the security.
     */
    public function withSecurityName(string $securityName): self
    {
        $self = clone $this;
        $self['securityName'] = $securityName;

        return $self;
    }

    /**
     * Trading symbol.
     */
    public function withSecuritySymbol(string $securitySymbol): self
    {
        $self = clone $this;
        $self['securitySymbol'] = $securitySymbol;

        return $self;
    }

    /**
     * Total quantity sold.
     */
    public function withSellQuantity(float $sellQuantity): self
    {
        $self = clone $this;
        $self['sellQuantity'] = $sellQuantity;

        return $self;
    }

    /**
     * Total value of sell transactions.
     */
    public function withSellTotalValue(float $sellTotalValue): self
    {
        $self = clone $this;
        $self['sellTotalValue'] = $sellTotalValue;

        return $self;
    }

    /**
     * Weighted Average Price for sell transactions.
     */
    public function withSellWap(float $sellWap): self
    {
        $self = clone $this;
        $self['sellWap'] = $sellWap;

        return $self;
    }
}
