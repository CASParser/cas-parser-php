<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse\Summary;

use CasParser\CasParser\UnifiedResponse\Summary\Accounts\Demat;
use CasParser\CasParser\UnifiedResponse\Summary\Accounts\Insurance;
use CasParser\CasParser\UnifiedResponse\Summary\Accounts\MutualFunds;
use CasParser\CasParser\UnifiedResponse\Summary\Accounts\Nps;
use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type DematShape from \CasParser\CasParser\UnifiedResponse\Summary\Accounts\Demat
 * @phpstan-import-type InsuranceShape from \CasParser\CasParser\UnifiedResponse\Summary\Accounts\Insurance
 * @phpstan-import-type MutualFundsShape from \CasParser\CasParser\UnifiedResponse\Summary\Accounts\MutualFunds
 * @phpstan-import-type NpsShape from \CasParser\CasParser\UnifiedResponse\Summary\Accounts\Nps
 *
 * @phpstan-type AccountsShape = array{
 *   demat?: null|Demat|DematShape,
 *   insurance?: null|Insurance|InsuranceShape,
 *   mutualFunds?: null|MutualFunds|MutualFundsShape,
 *   nps?: null|Nps|NpsShape,
 * }
 */
final class Accounts implements BaseModel
{
    /** @use SdkModel<AccountsShape> */
    use SdkModel;

    #[Optional]
    public ?Demat $demat;

    #[Optional]
    public ?Insurance $insurance;

    #[Optional('mutual_funds')]
    public ?MutualFunds $mutualFunds;

    #[Optional]
    public ?Nps $nps;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Demat|DematShape|null $demat
     * @param Insurance|InsuranceShape|null $insurance
     * @param MutualFunds|MutualFundsShape|null $mutualFunds
     * @param Nps|NpsShape|null $nps
     */
    public static function with(
        Demat|array|null $demat = null,
        Insurance|array|null $insurance = null,
        MutualFunds|array|null $mutualFunds = null,
        Nps|array|null $nps = null,
    ): self {
        $self = new self;

        null !== $demat && $self['demat'] = $demat;
        null !== $insurance && $self['insurance'] = $insurance;
        null !== $mutualFunds && $self['mutualFunds'] = $mutualFunds;
        null !== $nps && $self['nps'] = $nps;

        return $self;
    }

    /**
     * @param Demat|DematShape $demat
     */
    public function withDemat(Demat|array $demat): self
    {
        $self = clone $this;
        $self['demat'] = $demat;

        return $self;
    }

    /**
     * @param Insurance|InsuranceShape $insurance
     */
    public function withInsurance(Insurance|array $insurance): self
    {
        $self = clone $this;
        $self['insurance'] = $insurance;

        return $self;
    }

    /**
     * @param MutualFunds|MutualFundsShape $mutualFunds
     */
    public function withMutualFunds(MutualFunds|array $mutualFunds): self
    {
        $self = clone $this;
        $self['mutualFunds'] = $mutualFunds;

        return $self;
    }

    /**
     * @param Nps|NpsShape $nps
     */
    public function withNps(Nps|array $nps): self
    {
        $self = clone $this;
        $self['nps'] = $nps;

        return $self;
    }
}
