<?php

declare(strict_types=1);

namespace CasParser\ContractNote\ContractNoteParseResponse;

use CasParser\ContractNote\ContractNoteParseResponse\Data\BrokerInfo;
use CasParser\ContractNote\ContractNoteParseResponse\Data\ChargesSummary;
use CasParser\ContractNote\ContractNoteParseResponse\Data\ClientInfo;
use CasParser\ContractNote\ContractNoteParseResponse\Data\ContractNoteInfo;
use CasParser\ContractNote\ContractNoteParseResponse\Data\DerivativesTransaction;
use CasParser\ContractNote\ContractNoteParseResponse\Data\DetailedTrade;
use CasParser\ContractNote\ContractNoteParseResponse\Data\EquityTransaction;
use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type BrokerInfoShape from \CasParser\ContractNote\ContractNoteParseResponse\Data\BrokerInfo
 * @phpstan-import-type ChargesSummaryShape from \CasParser\ContractNote\ContractNoteParseResponse\Data\ChargesSummary
 * @phpstan-import-type ClientInfoShape from \CasParser\ContractNote\ContractNoteParseResponse\Data\ClientInfo
 * @phpstan-import-type ContractNoteInfoShape from \CasParser\ContractNote\ContractNoteParseResponse\Data\ContractNoteInfo
 * @phpstan-import-type DerivativesTransactionShape from \CasParser\ContractNote\ContractNoteParseResponse\Data\DerivativesTransaction
 * @phpstan-import-type DetailedTradeShape from \CasParser\ContractNote\ContractNoteParseResponse\Data\DetailedTrade
 * @phpstan-import-type EquityTransactionShape from \CasParser\ContractNote\ContractNoteParseResponse\Data\EquityTransaction
 *
 * @phpstan-type DataShape = array{
 *   brokerInfo?: null|BrokerInfo|BrokerInfoShape,
 *   chargesSummary?: null|ChargesSummary|ChargesSummaryShape,
 *   clientInfo?: null|ClientInfo|ClientInfoShape,
 *   contractNoteInfo?: null|ContractNoteInfo|ContractNoteInfoShape,
 *   derivativesTransactions?: list<DerivativesTransaction|DerivativesTransactionShape>|null,
 *   detailedTrades?: list<DetailedTrade|DetailedTradeShape>|null,
 *   equityTransactions?: list<EquityTransaction|EquityTransactionShape>|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional('broker_info')]
    public ?BrokerInfo $brokerInfo;

    /**
     * Breakdown of various charges and fees.
     */
    #[Optional('charges_summary')]
    public ?ChargesSummary $chargesSummary;

    #[Optional('client_info')]
    public ?ClientInfo $clientInfo;

    #[Optional('contract_note_info')]
    public ?ContractNoteInfo $contractNoteInfo;

    /**
     * Summary of derivatives transactions.
     *
     * @var list<DerivativesTransaction>|null $derivativesTransactions
     */
    #[Optional('derivatives_transactions', list: DerivativesTransaction::class)]
    public ?array $derivativesTransactions;

    /**
     * Detailed breakdown of all individual trades.
     *
     * @var list<DetailedTrade>|null $detailedTrades
     */
    #[Optional('detailed_trades', list: DetailedTrade::class)]
    public ?array $detailedTrades;

    /**
     * Summary of equity transactions grouped by security.
     *
     * @var list<EquityTransaction>|null $equityTransactions
     */
    #[Optional('equity_transactions', list: EquityTransaction::class)]
    public ?array $equityTransactions;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param BrokerInfo|BrokerInfoShape|null $brokerInfo
     * @param ChargesSummary|ChargesSummaryShape|null $chargesSummary
     * @param ClientInfo|ClientInfoShape|null $clientInfo
     * @param ContractNoteInfo|ContractNoteInfoShape|null $contractNoteInfo
     * @param list<DerivativesTransaction|DerivativesTransactionShape>|null $derivativesTransactions
     * @param list<DetailedTrade|DetailedTradeShape>|null $detailedTrades
     * @param list<EquityTransaction|EquityTransactionShape>|null $equityTransactions
     */
    public static function with(
        BrokerInfo|array|null $brokerInfo = null,
        ChargesSummary|array|null $chargesSummary = null,
        ClientInfo|array|null $clientInfo = null,
        ContractNoteInfo|array|null $contractNoteInfo = null,
        ?array $derivativesTransactions = null,
        ?array $detailedTrades = null,
        ?array $equityTransactions = null,
    ): self {
        $self = new self;

        null !== $brokerInfo && $self['brokerInfo'] = $brokerInfo;
        null !== $chargesSummary && $self['chargesSummary'] = $chargesSummary;
        null !== $clientInfo && $self['clientInfo'] = $clientInfo;
        null !== $contractNoteInfo && $self['contractNoteInfo'] = $contractNoteInfo;
        null !== $derivativesTransactions && $self['derivativesTransactions'] = $derivativesTransactions;
        null !== $detailedTrades && $self['detailedTrades'] = $detailedTrades;
        null !== $equityTransactions && $self['equityTransactions'] = $equityTransactions;

        return $self;
    }

    /**
     * @param BrokerInfo|BrokerInfoShape $brokerInfo
     */
    public function withBrokerInfo(BrokerInfo|array $brokerInfo): self
    {
        $self = clone $this;
        $self['brokerInfo'] = $brokerInfo;

        return $self;
    }

    /**
     * Breakdown of various charges and fees.
     *
     * @param ChargesSummary|ChargesSummaryShape $chargesSummary
     */
    public function withChargesSummary(
        ChargesSummary|array $chargesSummary
    ): self {
        $self = clone $this;
        $self['chargesSummary'] = $chargesSummary;

        return $self;
    }

    /**
     * @param ClientInfo|ClientInfoShape $clientInfo
     */
    public function withClientInfo(ClientInfo|array $clientInfo): self
    {
        $self = clone $this;
        $self['clientInfo'] = $clientInfo;

        return $self;
    }

    /**
     * @param ContractNoteInfo|ContractNoteInfoShape $contractNoteInfo
     */
    public function withContractNoteInfo(
        ContractNoteInfo|array $contractNoteInfo
    ): self {
        $self = clone $this;
        $self['contractNoteInfo'] = $contractNoteInfo;

        return $self;
    }

    /**
     * Summary of derivatives transactions.
     *
     * @param list<DerivativesTransaction|DerivativesTransactionShape> $derivativesTransactions
     */
    public function withDerivativesTransactions(
        array $derivativesTransactions
    ): self {
        $self = clone $this;
        $self['derivativesTransactions'] = $derivativesTransactions;

        return $self;
    }

    /**
     * Detailed breakdown of all individual trades.
     *
     * @param list<DetailedTrade|DetailedTradeShape> $detailedTrades
     */
    public function withDetailedTrades(array $detailedTrades): self
    {
        $self = clone $this;
        $self['detailedTrades'] = $detailedTrades;

        return $self;
    }

    /**
     * Summary of equity transactions grouped by security.
     *
     * @param list<EquityTransaction|EquityTransactionShape> $equityTransactions
     */
    public function withEquityTransactions(array $equityTransactions): self
    {
        $self = clone $this;
        $self['equityTransactions'] = $equityTransactions;

        return $self;
    }
}
