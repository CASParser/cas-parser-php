<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse;

use CasParser\CasParser\UnifiedResponse\Summary\Accounts;
use CasParser\Core\Attributes\Api;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type summary_alias = array{
 *   accounts?: Accounts|null, totalValue?: float|null
 * }
 */
final class Summary implements BaseModel
{
    /** @use SdkModel<summary_alias> */
    use SdkModel;

    #[Api(optional: true)]
    public ?Accounts $accounts;

    /**
     * Total portfolio value across all accounts.
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
        ?Accounts $accounts = null,
        ?float $totalValue = null
    ): self {
        $obj = new self;

        null !== $accounts && $obj->accounts = $accounts;
        null !== $totalValue && $obj->totalValue = $totalValue;

        return $obj;
    }

    public function withAccounts(Accounts $accounts): self
    {
        $obj = clone $this;
        $obj->accounts = $accounts;

        return $obj;
    }

    /**
     * Total portfolio value across all accounts.
     */
    public function withTotalValue(float $totalValue): self
    {
        $obj = clone $this;
        $obj->totalValue = $totalValue;

        return $obj;
    }
}
