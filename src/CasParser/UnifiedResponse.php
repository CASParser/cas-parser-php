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
use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type DematAccountShape from \CasParser\CasParser\UnifiedResponse\DematAccount
 * @phpstan-import-type InsuranceShape from \CasParser\CasParser\UnifiedResponse\Insurance
 * @phpstan-import-type InvestorShape from \CasParser\CasParser\UnifiedResponse\Investor
 * @phpstan-import-type MetaShape from \CasParser\CasParser\UnifiedResponse\Meta
 * @phpstan-import-type MutualFundShape from \CasParser\CasParser\UnifiedResponse\MutualFund
 * @phpstan-import-type NpShape from \CasParser\CasParser\UnifiedResponse\Np
 * @phpstan-import-type SummaryShape from \CasParser\CasParser\UnifiedResponse\Summary
 *
 * @phpstan-type UnifiedResponseShape = array{
 *   dematAccounts?: list<DematAccountShape>|null,
 *   insurance?: null|Insurance|InsuranceShape,
 *   investor?: null|Investor|InvestorShape,
 *   meta?: null|Meta|MetaShape,
 *   mutualFunds?: list<MutualFundShape>|null,
 *   nps?: list<NpShape>|null,
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
     * @param list<DematAccountShape>|null $dematAccounts
     * @param Insurance|InsuranceShape|null $insurance
     * @param Investor|InvestorShape|null $investor
     * @param Meta|MetaShape|null $meta
     * @param list<MutualFundShape>|null $mutualFunds
     * @param list<NpShape>|null $nps
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
     * @param list<DematAccountShape> $dematAccounts
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
     * @param list<MutualFundShape> $mutualFunds
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
     * @param list<NpShape> $nps
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
