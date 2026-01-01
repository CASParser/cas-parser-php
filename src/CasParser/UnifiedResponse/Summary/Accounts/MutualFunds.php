<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse\Summary\Accounts;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type MutualFundsShape = array{
 *   count?: int|null, totalValue?: float|null
 * }
 */
final class MutualFunds implements BaseModel
{
    /** @use SdkModel<MutualFundsShape> */
    use SdkModel;

    /**
     * Number of mutual fund folios.
     */
    #[Optional]
    public ?int $count;

    /**
     * Total value of mutual funds.
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
     */
    public static function with(
        ?int $count = null,
        ?float $totalValue = null
    ): self {
        $self = new self;

        null !== $count && $self['count'] = $count;
        null !== $totalValue && $self['totalValue'] = $totalValue;

        return $self;
    }

    /**
     * Number of mutual fund folios.
     */
    public function withCount(int $count): self
    {
        $self = clone $this;
        $self['count'] = $count;

        return $self;
    }

    /**
     * Total value of mutual funds.
     */
    public function withTotalValue(float $totalValue): self
    {
        $self = clone $this;
        $self['totalValue'] = $totalValue;

        return $self;
    }
}
