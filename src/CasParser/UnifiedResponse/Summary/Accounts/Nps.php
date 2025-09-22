<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse\Summary\Accounts;

use CasParser\Core\Attributes\Api;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type nps_alias = array{count?: int, totalValue?: float}
 */
final class Nps implements BaseModel
{
    /** @use SdkModel<nps_alias> */
    use SdkModel;

    /**
     * Number of NPS accounts.
     */
    #[Api(optional: true)]
    public ?int $count;

    /**
     * Total value of NPS accounts.
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
     * Number of NPS accounts.
     */
    public function withCount(int $count): self
    {
        $obj = clone $this;
        $obj->count = $count;

        return $obj;
    }

    /**
     * Total value of NPS accounts.
     */
    public function withTotalValue(float $totalValue): self
    {
        $obj = clone $this;
        $obj->totalValue = $totalValue;

        return $obj;
    }
}
