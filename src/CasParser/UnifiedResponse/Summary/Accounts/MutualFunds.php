<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse\Summary\Accounts;

use CasParser\Core\Attributes\Api;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type MutualFundsShape = array{
 *   count?: int|null, total_value?: float|null
 * }
 */
final class MutualFunds implements BaseModel
{
    /** @use SdkModel<MutualFundsShape> */
    use SdkModel;

    /**
     * Number of mutual fund folios.
     */
    #[Api(optional: true)]
    public ?int $count;

    /**
     * Total value of mutual funds.
     */
    #[Api(optional: true)]
    public ?float $total_value;

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
        ?float $total_value = null
    ): self {
        $obj = new self;

        null !== $count && $obj->count = $count;
        null !== $total_value && $obj->total_value = $total_value;

        return $obj;
    }

    /**
     * Number of mutual fund folios.
     */
    public function withCount(int $count): self
    {
        $obj = clone $this;
        $obj->count = $count;

        return $obj;
    }

    /**
     * Total value of mutual funds.
     */
    public function withTotalValue(float $totalValue): self
    {
        $obj = clone $this;
        $obj->total_value = $totalValue;

        return $obj;
    }
}
