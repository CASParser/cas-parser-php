<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse\Summary\Accounts;

use CasParser\Core\Attributes\Api;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

final class MutualFunds implements BaseModel
{
    use SdkModel;

    /**
     * Number of mutual fund folios.
     */
    #[Api(optional: true)]
    public ?int $count;

    /**
     * Total value of mutual funds.
     */
    #[Api('total_value', optional: true)]
    public ?float $totalValue;

    public function __construct()
    {
        self::introspect();
        $this->unsetOptionalProperties();
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
        $obj->totalValue = $totalValue;

        return $obj;
    }
}
