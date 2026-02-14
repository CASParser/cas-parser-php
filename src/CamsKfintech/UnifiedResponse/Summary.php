<?php

declare(strict_types=1);

namespace CasParser\CamsKfintech\UnifiedResponse;

use CasParser\CamsKfintech\UnifiedResponse\Summary\Accounts;
use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AccountsShape from \CasParser\CamsKfintech\UnifiedResponse\Summary\Accounts
 *
 * @phpstan-type SummaryShape = array{
 *   accounts?: null|Accounts|AccountsShape, totalValue?: float|null
 * }
 */
final class Summary implements BaseModel
{
    /** @use SdkModel<SummaryShape> */
    use SdkModel;

    #[Optional]
    public ?Accounts $accounts;

    /**
     * Total portfolio value across all accounts.
     */
    #[Optional('total_value')]
    public ?float $totalValue;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Accounts|AccountsShape|null $accounts
     */
    public static function with(
        Accounts|array|null $accounts = null,
        ?float $totalValue = null
    ): self {
        $self = new self;

        null !== $accounts && $self['accounts'] = $accounts;
        null !== $totalValue && $self['totalValue'] = $totalValue;

        return $self;
    }

    /**
     * @param Accounts|AccountsShape $accounts
     */
    public function withAccounts(Accounts|array $accounts): self
    {
        $self = clone $this;
        $self['accounts'] = $accounts;

        return $self;
    }

    /**
     * Total portfolio value across all accounts.
     */
    public function withTotalValue(float $totalValue): self
    {
        $self = clone $this;
        $self['totalValue'] = $totalValue;

        return $self;
    }
}
