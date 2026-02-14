<?php

declare(strict_types=1);

namespace CasParser\ContractNote\ContractNoteParseResponse\Data;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * Breakdown of various charges and fees.
 *
 * @phpstan-type ChargesSummaryShape = array{
 *   cgst?: float|null,
 *   exchangeTransactionCharges?: float|null,
 *   igst?: float|null,
 *   netAmountReceivablePayable?: float|null,
 *   payInPayOutObligation?: float|null,
 *   sebiTurnoverFees?: float|null,
 *   securitiesTransactionTax?: float|null,
 *   sgst?: float|null,
 *   stampDuty?: float|null,
 *   taxableValueBrokerage?: float|null,
 * }
 */
final class ChargesSummary implements BaseModel
{
    /** @use SdkModel<ChargesSummaryShape> */
    use SdkModel;

    /**
     * Central GST amount.
     */
    #[Optional]
    public ?float $cgst;

    /**
     * Exchange transaction charges.
     */
    #[Optional('exchange_transaction_charges')]
    public ?float $exchangeTransactionCharges;

    /**
     * Integrated GST amount.
     */
    #[Optional]
    public ?float $igst;

    /**
     * Final net amount receivable or payable.
     */
    #[Optional('net_amount_receivable_payable')]
    public ?float $netAmountReceivablePayable;

    /**
     * Net pay-in/pay-out obligation.
     */
    #[Optional('pay_in_pay_out_obligation')]
    public ?float $payInPayOutObligation;

    /**
     * SEBI turnover fees.
     */
    #[Optional('sebi_turnover_fees')]
    public ?float $sebiTurnoverFees;

    /**
     * Securities Transaction Tax.
     */
    #[Optional('securities_transaction_tax')]
    public ?float $securitiesTransactionTax;

    /**
     * State GST amount.
     */
    #[Optional]
    public ?float $sgst;

    /**
     * Stamp duty charges.
     */
    #[Optional('stamp_duty')]
    public ?float $stampDuty;

    /**
     * Taxable brokerage amount.
     */
    #[Optional('taxable_value_brokerage')]
    public ?float $taxableValueBrokerage;

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
        ?float $cgst = null,
        ?float $exchangeTransactionCharges = null,
        ?float $igst = null,
        ?float $netAmountReceivablePayable = null,
        ?float $payInPayOutObligation = null,
        ?float $sebiTurnoverFees = null,
        ?float $securitiesTransactionTax = null,
        ?float $sgst = null,
        ?float $stampDuty = null,
        ?float $taxableValueBrokerage = null,
    ): self {
        $self = new self;

        null !== $cgst && $self['cgst'] = $cgst;
        null !== $exchangeTransactionCharges && $self['exchangeTransactionCharges'] = $exchangeTransactionCharges;
        null !== $igst && $self['igst'] = $igst;
        null !== $netAmountReceivablePayable && $self['netAmountReceivablePayable'] = $netAmountReceivablePayable;
        null !== $payInPayOutObligation && $self['payInPayOutObligation'] = $payInPayOutObligation;
        null !== $sebiTurnoverFees && $self['sebiTurnoverFees'] = $sebiTurnoverFees;
        null !== $securitiesTransactionTax && $self['securitiesTransactionTax'] = $securitiesTransactionTax;
        null !== $sgst && $self['sgst'] = $sgst;
        null !== $stampDuty && $self['stampDuty'] = $stampDuty;
        null !== $taxableValueBrokerage && $self['taxableValueBrokerage'] = $taxableValueBrokerage;

        return $self;
    }

    /**
     * Central GST amount.
     */
    public function withCgst(float $cgst): self
    {
        $self = clone $this;
        $self['cgst'] = $cgst;

        return $self;
    }

    /**
     * Exchange transaction charges.
     */
    public function withExchangeTransactionCharges(
        float $exchangeTransactionCharges
    ): self {
        $self = clone $this;
        $self['exchangeTransactionCharges'] = $exchangeTransactionCharges;

        return $self;
    }

    /**
     * Integrated GST amount.
     */
    public function withIgst(float $igst): self
    {
        $self = clone $this;
        $self['igst'] = $igst;

        return $self;
    }

    /**
     * Final net amount receivable or payable.
     */
    public function withNetAmountReceivablePayable(
        float $netAmountReceivablePayable
    ): self {
        $self = clone $this;
        $self['netAmountReceivablePayable'] = $netAmountReceivablePayable;

        return $self;
    }

    /**
     * Net pay-in/pay-out obligation.
     */
    public function withPayInPayOutObligation(
        float $payInPayOutObligation
    ): self {
        $self = clone $this;
        $self['payInPayOutObligation'] = $payInPayOutObligation;

        return $self;
    }

    /**
     * SEBI turnover fees.
     */
    public function withSebiTurnoverFees(float $sebiTurnoverFees): self
    {
        $self = clone $this;
        $self['sebiTurnoverFees'] = $sebiTurnoverFees;

        return $self;
    }

    /**
     * Securities Transaction Tax.
     */
    public function withSecuritiesTransactionTax(
        float $securitiesTransactionTax
    ): self {
        $self = clone $this;
        $self['securitiesTransactionTax'] = $securitiesTransactionTax;

        return $self;
    }

    /**
     * State GST amount.
     */
    public function withSgst(float $sgst): self
    {
        $self = clone $this;
        $self['sgst'] = $sgst;

        return $self;
    }

    /**
     * Stamp duty charges.
     */
    public function withStampDuty(float $stampDuty): self
    {
        $self = clone $this;
        $self['stampDuty'] = $stampDuty;

        return $self;
    }

    /**
     * Taxable brokerage amount.
     */
    public function withTaxableValueBrokerage(
        float $taxableValueBrokerage
    ): self {
        $self = clone $this;
        $self['taxableValueBrokerage'] = $taxableValueBrokerage;

        return $self;
    }
}
