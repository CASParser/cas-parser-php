<?php

declare(strict_types=1);

namespace CasParser\CamsKfintech\UnifiedResponse\Summary\Accounts;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type DematShape = array{count?: int|null, totalValue?: float|null}
 */
final class Demat implements BaseModel
{
    /** @use SdkModel<DematShape> */
    use SdkModel;

    /**
     * Number of demat accounts.
     */
    #[Optional]
    public ?int $count;

    /**
     * Total value of demat accounts.
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
     * Number of demat accounts.
     */
    public function withCount(int $count): self
    {
        $self = clone $this;
        $self['count'] = $count;

        return $self;
    }

    /**
     * Total value of demat accounts.
     */
    public function withTotalValue(float $totalValue): self
    {
        $self = clone $this;
        $self['totalValue'] = $totalValue;

        return $self;
    }
}
