<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse\Summary;

use CasParser\CasParser\UnifiedResponse\Summary\Accounts\Demat;
use CasParser\CasParser\UnifiedResponse\Summary\Accounts\Insurance;
use CasParser\CasParser\UnifiedResponse\Summary\Accounts\MutualFunds;
use CasParser\CasParser\UnifiedResponse\Summary\Accounts\Nps;
use CasParser\Core\Attributes\Api;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type AccountsShape = array{
 *   demat?: Demat, insurance?: Insurance, mutualFunds?: MutualFunds, nps?: Nps
 * }
 */
final class Accounts implements BaseModel
{
    /** @use SdkModel<AccountsShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?Demat $demat;

    #[Api(optional: true)]
    public ?Insurance $insurance;

    #[Api('mutual_funds', optional: true)]
    public ?MutualFunds $mutualFunds;

    #[Api(optional: true)]
    public ?Nps $nps;

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
        ?Nps $nps = null,
    ): self {
        $obj = new self;

        null !== $demat && $obj->demat = $demat;
        null !== $insurance && $obj->insurance = $insurance;
        null !== $mutualFunds && $obj->mutualFunds = $mutualFunds;
        null !== $nps && $obj->nps = $nps;

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

    public function withNps(Nps $nps): self
    {
        $obj = clone $this;
        $obj->nps = $nps;

        return $obj;
    }
}
