<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse;

use CasParser\CasParser\UnifiedResponse\Summary\Accounts;
use CasParser\Core\Attributes\Api;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type SummaryShape = array{
 *   accounts?: Accounts|null, total_value?: float|null
 * }
 */
final class Summary implements BaseModel
{
    /** @use SdkModel<SummaryShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?Accounts $accounts;

    /**
     * Total portfolio value across all accounts.
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
        ?Accounts $accounts = null,
        ?float $total_value = null
    ): self {
        $obj = new self;

        null !== $accounts && $obj->accounts = $accounts;
        null !== $total_value && $obj->total_value = $total_value;

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
        $obj->total_value = $totalValue;

        return $obj;
    }
}
