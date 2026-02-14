<?php

declare(strict_types=1);

namespace CasParser\ContractNote\ContractNoteParseResponse\Data;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type ContractNoteInfoShape = array{
 *   contractNoteNumber?: string|null,
 *   settlementDate?: string|null,
 *   settlementNumber?: string|null,
 *   tradeDate?: string|null,
 * }
 */
final class ContractNoteInfo implements BaseModel
{
    /** @use SdkModel<ContractNoteInfoShape> */
    use SdkModel;

    /**
     * Contract note reference number.
     */
    #[Optional('contract_note_number')]
    public ?string $contractNoteNumber;

    /**
     * Settlement date for the trades.
     */
    #[Optional('settlement_date')]
    public ?string $settlementDate;

    /**
     * Settlement reference number.
     */
    #[Optional('settlement_number')]
    public ?string $settlementNumber;

    /**
     * Date when trades were executed.
     */
    #[Optional('trade_date')]
    public ?string $tradeDate;

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
        ?string $contractNoteNumber = null,
        ?string $settlementDate = null,
        ?string $settlementNumber = null,
        ?string $tradeDate = null,
    ): self {
        $self = new self;

        null !== $contractNoteNumber && $self['contractNoteNumber'] = $contractNoteNumber;
        null !== $settlementDate && $self['settlementDate'] = $settlementDate;
        null !== $settlementNumber && $self['settlementNumber'] = $settlementNumber;
        null !== $tradeDate && $self['tradeDate'] = $tradeDate;

        return $self;
    }

    /**
     * Contract note reference number.
     */
    public function withContractNoteNumber(string $contractNoteNumber): self
    {
        $self = clone $this;
        $self['contractNoteNumber'] = $contractNoteNumber;

        return $self;
    }

    /**
     * Settlement date for the trades.
     */
    public function withSettlementDate(string $settlementDate): self
    {
        $self = clone $this;
        $self['settlementDate'] = $settlementDate;

        return $self;
    }

    /**
     * Settlement reference number.
     */
    public function withSettlementNumber(string $settlementNumber): self
    {
        $self = clone $this;
        $self['settlementNumber'] = $settlementNumber;

        return $self;
    }

    /**
     * Date when trades were executed.
     */
    public function withTradeDate(string $tradeDate): self
    {
        $self = clone $this;
        $self['tradeDate'] = $tradeDate;

        return $self;
    }
}
