<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse\Summary\Accounts;

use CasParser\Core\Attributes\Api;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type DematShape = array{count?: int, totalValue?: float}
 */
final class Demat implements BaseModel
{
    /** @use SdkModel<DematShape> */
    use SdkModel;

    /**
     * Number of demat accounts.
     */
    #[Api(optional: true)]
    public ?int $count;

    /**
     * Total value of demat accounts.
     */
    #[Api('total_value', optional: true)]
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
        $obj = new self;

        null !== $count && $obj->count = $count;
        null !== $totalValue && $obj->totalValue = $totalValue;

        return $obj;
    }

    /**
     * Number of demat accounts.
     */
    public function withCount(int $count): self
    {
        $obj = clone $this;
        $obj->count = $count;

        return $obj;
    }

    /**
     * Total value of demat accounts.
     */
    public function withTotalValue(float $totalValue): self
    {
        $obj = clone $this;
        $obj->totalValue = $totalValue;

        return $obj;
    }
}
