<?php

declare(strict_types=1);

namespace CasParser\CamsKfintech;

use CasParser\CamsKfintech\UnifiedResponse\DematAccount;
use CasParser\CamsKfintech\UnifiedResponse\Insurance;
use CasParser\CamsKfintech\UnifiedResponse\Investor;
use CasParser\CamsKfintech\UnifiedResponse\Meta;
use CasParser\CamsKfintech\UnifiedResponse\MutualFund;
use CasParser\CamsKfintech\UnifiedResponse\Np;
use CasParser\CamsKfintech\UnifiedResponse\Summary;
use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type DematAccountShape from \CasParser\CamsKfintech\UnifiedResponse\DematAccount
 * @phpstan-import-type InsuranceShape from \CasParser\CamsKfintech\UnifiedResponse\Insurance
 * @phpstan-import-type InvestorShape from \CasParser\CamsKfintech\UnifiedResponse\Investor
 * @phpstan-import-type MetaShape from \CasParser\CamsKfintech\UnifiedResponse\Meta
 * @phpstan-import-type MutualFundShape from \CasParser\CamsKfintech\UnifiedResponse\MutualFund
 * @phpstan-import-type NpShape from \CasParser\CamsKfintech\UnifiedResponse\Np
 * @phpstan-import-type SummaryShape from \CasParser\CamsKfintech\UnifiedResponse\Summary
 *
 * @phpstan-type UnifiedResponseShape = array{
 *   dematAccounts?: list<DematAccount|DematAccountShape>|null,
 *   insurance?: null|Insurance|InsuranceShape,
 *   investor?: null|Investor|InvestorShape,
 *   meta?: null|Meta|MetaShape,
 *   mutualFunds?: list<MutualFund|MutualFundShape>|null,
 *   nps?: list<Np|NpShape>|null,
 *   summary?: null|Summary|SummaryShape,
 * }
 */
final class UnifiedResponse implements BaseModel
{
    /** @use SdkModel<UnifiedResponseShape> */
    use SdkModel;

    /** @var list<DematAccount>|null $dematAccounts */
    #[Optional('demat_accounts', list: DematAccount::class)]
    public ?array $dematAccounts;

    #[Optional]
    public ?Insurance $insurance;

    #[Optional]
    public ?Investor $investor;

    #[Optional]
    public ?Meta $meta;

    /** @var list<MutualFund>|null $mutualFunds */
    #[Optional('mutual_funds', list: MutualFund::class)]
    public ?array $mutualFunds;

    /**
     * List of NPS accounts.
     *
     * @var list<Np>|null $nps
     */
    #[Optional(list: Np::class)]
    public ?array $nps;

    #[Optional]
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
     * @param list<DematAccount|DematAccountShape>|null $dematAccounts
     * @param Insurance|InsuranceShape|null $insurance
     * @param Investor|InvestorShape|null $investor
     * @param Meta|MetaShape|null $meta
     * @param list<MutualFund|MutualFundShape>|null $mutualFunds
     * @param list<Np|NpShape>|null $nps
     * @param Summary|SummaryShape|null $summary
     */
    public static function with(
        ?array $dematAccounts = null,
        Insurance|array|null $insurance = null,
        Investor|array|null $investor = null,
        Meta|array|null $meta = null,
        ?array $mutualFunds = null,
        ?array $nps = null,
        Summary|array|null $summary = null,
    ): self {
        $self = new self;

        null !== $dematAccounts && $self['dematAccounts'] = $dematAccounts;
        null !== $insurance && $self['insurance'] = $insurance;
        null !== $investor && $self['investor'] = $investor;
        null !== $meta && $self['meta'] = $meta;
        null !== $mutualFunds && $self['mutualFunds'] = $mutualFunds;
        null !== $nps && $self['nps'] = $nps;
        null !== $summary && $self['summary'] = $summary;

        return $self;
    }

    /**
     * @param list<DematAccount|DematAccountShape> $dematAccounts
     */
    public function withDematAccounts(array $dematAccounts): self
    {
        $self = clone $this;
        $self['dematAccounts'] = $dematAccounts;

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
     * @param Investor|InvestorShape $investor
     */
    public function withInvestor(Investor|array $investor): self
    {
        $self = clone $this;
        $self['investor'] = $investor;

        return $self;
    }

    /**
     * @param Meta|MetaShape $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<MutualFund|MutualFundShape> $mutualFunds
     */
    public function withMutualFunds(array $mutualFunds): self
    {
        $self = clone $this;
        $self['mutualFunds'] = $mutualFunds;

        return $self;
    }

    /**
     * List of NPS accounts.
     *
     * @param list<Np|NpShape> $nps
     */
    public function withNps(array $nps): self
    {
        $self = clone $this;
        $self['nps'] = $nps;

        return $self;
    }

    /**
     * @param Summary|SummaryShape $summary
     */
    public function withSummary(Summary|array $summary): self
    {
        $self = clone $this;
        $self['summary'] = $summary;

        return $self;
    }
}
