<?php

declare(strict_types=1);

namespace CasParser\CasParser;

use CasParser\CasParser\UnifiedResponse\DematAccount;
use CasParser\CasParser\UnifiedResponse\Insurance;
use CasParser\CasParser\UnifiedResponse\Investor;
use CasParser\CasParser\UnifiedResponse\Meta;
use CasParser\CasParser\UnifiedResponse\MutualFund;
use CasParser\CasParser\UnifiedResponse\Np;
use CasParser\CasParser\UnifiedResponse\Summary;
use CasParser\Core\Attributes\Api;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Concerns\SdkResponse;
use CasParser\Core\Contracts\BaseModel;
use CasParser\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type UnifiedResponseShape = array{
 *   demat_accounts?: list<DematAccount>|null,
 *   insurance?: Insurance|null,
 *   investor?: Investor|null,
 *   meta?: Meta|null,
 *   mutual_funds?: list<MutualFund>|null,
 *   nps?: list<Np>|null,
 *   summary?: Summary|null,
 * }
 */
final class UnifiedResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<UnifiedResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<DematAccount>|null $demat_accounts */
    #[Api(list: DematAccount::class, optional: true)]
    public ?array $demat_accounts;

    #[Api(optional: true)]
    public ?Insurance $insurance;

    #[Api(optional: true)]
    public ?Investor $investor;

    #[Api(optional: true)]
    public ?Meta $meta;

    /** @var list<MutualFund>|null $mutual_funds */
    #[Api(list: MutualFund::class, optional: true)]
    public ?array $mutual_funds;

    /**
     * List of NPS accounts.
     *
     * @var list<Np>|null $nps
     */
    #[Api(list: Np::class, optional: true)]
    public ?array $nps;

    #[Api(optional: true)]
    public ?Summary $summary;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<DematAccount> $demat_accounts
     * @param list<MutualFund> $mutual_funds
     * @param list<Np> $nps
     */
    public static function with(
        ?array $demat_accounts = null,
        ?Insurance $insurance = null,
        ?Investor $investor = null,
        ?Meta $meta = null,
        ?array $mutual_funds = null,
        ?array $nps = null,
        ?Summary $summary = null,
    ): self {
        $obj = new self;

        null !== $demat_accounts && $obj->demat_accounts = $demat_accounts;
        null !== $insurance && $obj->insurance = $insurance;
        null !== $investor && $obj->investor = $investor;
        null !== $meta && $obj->meta = $meta;
        null !== $mutual_funds && $obj->mutual_funds = $mutual_funds;
        null !== $nps && $obj->nps = $nps;
        null !== $summary && $obj->summary = $summary;

        return $obj;
    }

    /**
     * @param list<DematAccount> $dematAccounts
     */
    public function withDematAccounts(array $dematAccounts): self
    {
        $obj = clone $this;
        $obj->demat_accounts = $dematAccounts;

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
        $obj->mutual_funds = $mutualFunds;

        return $obj;
    }

    /**
     * List of NPS accounts.
     *
     * @param list<Np> $nps
     */
    public function withNps(array $nps): self
    {
        $obj = clone $this;
        $obj->nps = $nps;

        return $obj;
    }

    public function withSummary(Summary $summary): self
    {
        $obj = clone $this;
        $obj->summary = $summary;

        return $obj;
    }
}
