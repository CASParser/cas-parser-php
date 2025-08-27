<?php

declare(strict_types=1);

namespace CasParser\CasParser;

use CasParser\CasParser\UnifiedResponse\DematAccount;
use CasParser\CasParser\UnifiedResponse\Insurance;
use CasParser\CasParser\UnifiedResponse\Investor;
use CasParser\CasParser\UnifiedResponse\Meta;
use CasParser\CasParser\UnifiedResponse\MutualFund;
use CasParser\CasParser\UnifiedResponse\Summary;
use CasParser\Core\Attributes\Api;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type unified_response = array{
 *   dematAccounts?: list<DematAccount>|null,
 *   insurance?: Insurance|null,
 *   investor?: Investor|null,
 *   meta?: Meta|null,
 *   mutualFunds?: list<MutualFund>|null,
 *   summary?: Summary|null,
 * }
 */
final class UnifiedResponse implements BaseModel
{
    /** @use SdkModel<unified_response> */
    use SdkModel;

    /** @var list<DematAccount>|null $dematAccounts */
    #[Api('demat_accounts', list: DematAccount::class, optional: true)]
    public ?array $dematAccounts;

    #[Api(optional: true)]
    public ?Insurance $insurance;

    #[Api(optional: true)]
    public ?Investor $investor;

    #[Api(optional: true)]
    public ?Meta $meta;

    /** @var list<MutualFund>|null $mutualFunds */
    #[Api('mutual_funds', list: MutualFund::class, optional: true)]
    public ?array $mutualFunds;

    #[Api(optional: true)]
    public ?Summary $summary;

    public function __construct()
    {
        self::introspect();
        $this->unsetOptionalProperties();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<DematAccount> $dematAccounts
     * @param list<MutualFund> $mutualFunds
     */
    public static function with(
        ?array $dematAccounts = null,
        ?Insurance $insurance = null,
        ?Investor $investor = null,
        ?Meta $meta = null,
        ?array $mutualFunds = null,
        ?Summary $summary = null,
    ): self {
        $obj = new self;

        null !== $dematAccounts && $obj->dematAccounts = $dematAccounts;
        null !== $insurance && $obj->insurance = $insurance;
        null !== $investor && $obj->investor = $investor;
        null !== $meta && $obj->meta = $meta;
        null !== $mutualFunds && $obj->mutualFunds = $mutualFunds;
        null !== $summary && $obj->summary = $summary;

        return $obj;
    }

    /**
     * @param list<DematAccount> $dematAccounts
     */
    public function withDematAccounts(array $dematAccounts): self
    {
        $obj = clone $this;
        $obj->dematAccounts = $dematAccounts;

        return $obj;
    }

    public function withInsurance(Insurance $insurance): self
    {
        $obj = clone $this;
        $obj->insurance = $insurance;

        return $obj;
    }

    public function withInvestor(Investor $investor): self
    {
        $obj = clone $this;
        $obj->investor = $investor;

        return $obj;
    }

    public function withMeta(Meta $meta): self
    {
        $obj = clone $this;
        $obj->meta = $meta;

        return $obj;
    }

    /**
     * @param list<MutualFund> $mutualFunds
     */
    public function withMutualFunds(array $mutualFunds): self
    {
        $obj = clone $this;
        $obj->mutualFunds = $mutualFunds;

        return $obj;
    }

    public function withSummary(Summary $summary): self
    {
        $obj = clone $this;
        $obj->summary = $summary;

        return $obj;
    }
}
