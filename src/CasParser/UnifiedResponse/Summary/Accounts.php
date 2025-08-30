<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse\Summary;

use CasParser\CasParser\UnifiedResponse\Summary\Accounts\Demat;
use CasParser\CasParser\UnifiedResponse\Summary\Accounts\Insurance;
use CasParser\CasParser\UnifiedResponse\Summary\Accounts\MutualFunds;
use CasParser\Core\Attributes\Api;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type accounts_alias = array{
 *   demat?: Demat|null, insurance?: Insurance|null, mutualFunds?: MutualFunds|null
 * }
 */
final class Accounts implements BaseModel
{
    /** @use SdkModel<accounts_alias> */
    use SdkModel;

    #[Api(optional: true)]
    public ?Demat $demat;

    #[Api(optional: true)]
    public ?Insurance $insurance;

    #[Api('mutual_funds', optional: true)]
    public ?MutualFunds $mutualFunds;

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
        ?Demat $demat = null,
        ?Insurance $insurance = null,
        ?MutualFunds $mutualFunds = null,
    ): self {
        $obj = new self;

        null !== $demat && $obj->demat = $demat;
        null !== $insurance && $obj->insurance = $insurance;
        null !== $mutualFunds && $obj->mutualFunds = $mutualFunds;

        return $obj;
    }

    public function withDemat(Demat $demat): self
    {
        $obj = clone $this;
        $obj->demat = $demat;

        return $obj;
    }

    public function withInsurance(Insurance $insurance): self
    {
        $obj = clone $this;
        $obj->insurance = $insurance;

        return $obj;
    }

    public function withMutualFunds(MutualFunds $mutualFunds): self
    {
        $obj = clone $this;
        $obj->mutualFunds = $mutualFunds;

        return $obj;
    }
}
