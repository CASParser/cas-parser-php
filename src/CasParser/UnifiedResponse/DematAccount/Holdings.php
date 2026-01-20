<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse\DematAccount;

use CasParser\CasParser\UnifiedResponse\DematAccount\Holdings\Aif;
use CasParser\CasParser\UnifiedResponse\DematAccount\Holdings\CorporateBond;
use CasParser\CasParser\UnifiedResponse\DematAccount\Holdings\DematMutualFund;
use CasParser\CasParser\UnifiedResponse\DematAccount\Holdings\Equity;
use CasParser\CasParser\UnifiedResponse\DematAccount\Holdings\GovernmentSecurity;
use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AifShape from \CasParser\CasParser\UnifiedResponse\DematAccount\Holdings\Aif
 * @phpstan-import-type CorporateBondShape from \CasParser\CasParser\UnifiedResponse\DematAccount\Holdings\CorporateBond
 * @phpstan-import-type DematMutualFundShape from \CasParser\CasParser\UnifiedResponse\DematAccount\Holdings\DematMutualFund
 * @phpstan-import-type EquityShape from \CasParser\CasParser\UnifiedResponse\DematAccount\Holdings\Equity
 * @phpstan-import-type GovernmentSecurityShape from \CasParser\CasParser\UnifiedResponse\DematAccount\Holdings\GovernmentSecurity
 *
 * @phpstan-type HoldingsShape = array{
 *   aifs?: list<Aif|AifShape>|null,
 *   corporateBonds?: list<CorporateBond|CorporateBondShape>|null,
 *   dematMutualFunds?: list<DematMutualFund|DematMutualFundShape>|null,
 *   equities?: list<Equity|EquityShape>|null,
 *   governmentSecurities?: list<GovernmentSecurity|GovernmentSecurityShape>|null,
 * }
 */
final class Holdings implements BaseModel
{
    /** @use SdkModel<HoldingsShape> */
    use SdkModel;

    /** @var list<Aif>|null $aifs */
    #[Optional(list: Aif::class)]
    public ?array $aifs;

    /** @var list<CorporateBond>|null $corporateBonds */
    #[Optional('corporate_bonds', list: CorporateBond::class)]
    public ?array $corporateBonds;

    /** @var list<DematMutualFund>|null $dematMutualFunds */
    #[Optional('demat_mutual_funds', list: DematMutualFund::class)]
    public ?array $dematMutualFunds;

    /** @var list<Equity>|null $equities */
    #[Optional(list: Equity::class)]
    public ?array $equities;

    /** @var list<GovernmentSecurity>|null $governmentSecurities */
    #[Optional('government_securities', list: GovernmentSecurity::class)]
    public ?array $governmentSecurities;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Aif|AifShape>|null $aifs
     * @param list<CorporateBond|CorporateBondShape>|null $corporateBonds
     * @param list<DematMutualFund|DematMutualFundShape>|null $dematMutualFunds
     * @param list<Equity|EquityShape>|null $equities
     * @param list<GovernmentSecurity|GovernmentSecurityShape>|null $governmentSecurities
     */
    public static function with(
        ?array $aifs = null,
        ?array $corporateBonds = null,
        ?array $dematMutualFunds = null,
        ?array $equities = null,
        ?array $governmentSecurities = null,
    ): self {
        $self = new self;

        null !== $aifs && $self['aifs'] = $aifs;
        null !== $corporateBonds && $self['corporateBonds'] = $corporateBonds;
        null !== $dematMutualFunds && $self['dematMutualFunds'] = $dematMutualFunds;
        null !== $equities && $self['equities'] = $equities;
        null !== $governmentSecurities && $self['governmentSecurities'] = $governmentSecurities;

        return $self;
    }

    /**
     * @param list<Aif|AifShape> $aifs
     */
    public function withAifs(array $aifs): self
    {
        $self = clone $this;
        $self['aifs'] = $aifs;

        return $self;
    }

    /**
     * @param list<CorporateBond|CorporateBondShape> $corporateBonds
     */
    public function withCorporateBonds(array $corporateBonds): self
    {
        $self = clone $this;
        $self['corporateBonds'] = $corporateBonds;

        return $self;
    }

    /**
     * @param list<DematMutualFund|DematMutualFundShape> $dematMutualFunds
     */
    public function withDematMutualFunds(array $dematMutualFunds): self
    {
        $self = clone $this;
        $self['dematMutualFunds'] = $dematMutualFunds;

        return $self;
    }

    /**
     * @param list<Equity|EquityShape> $equities
     */
    public function withEquities(array $equities): self
    {
        $self = clone $this;
        $self['equities'] = $equities;

        return $self;
    }

    /**
     * @param list<GovernmentSecurity|GovernmentSecurityShape> $governmentSecurities
     */
    public function withGovernmentSecurities(array $governmentSecurities): self
    {
        $self = clone $this;
        $self['governmentSecurities'] = $governmentSecurities;

        return $self;
    }
}
