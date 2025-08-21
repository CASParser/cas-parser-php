<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse\DematAccount;

use CasParser\CasParser\UnifiedResponse\DematAccount\Holdings\Aif;
use CasParser\CasParser\UnifiedResponse\DematAccount\Holdings\CorporateBond;
use CasParser\CasParser\UnifiedResponse\DematAccount\Holdings\DematMutualFund;
use CasParser\CasParser\UnifiedResponse\DematAccount\Holdings\Equity;
use CasParser\CasParser\UnifiedResponse\DematAccount\Holdings\GovernmentSecurity;
use CasParser\Core\Attributes\Api;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;
use CasParser\Core\Conversion\ListOf;

/**
 * @phpstan-type holdings_alias = array{
 *   aifs?: list<Aif>,
 *   corporateBonds?: list<CorporateBond>,
 *   dematMutualFunds?: list<DematMutualFund>,
 *   equities?: list<Equity>,
 *   governmentSecurities?: list<GovernmentSecurity>,
 * }
 */
final class Holdings implements BaseModel
{
    use SdkModel;

    /** @var null|list<Aif> $aifs */
    #[Api(type: new ListOf(Aif::class), optional: true)]
    public ?array $aifs;

    /** @var null|list<CorporateBond> $corporateBonds */
    #[Api(
        'corporate_bonds',
        type: new ListOf(CorporateBond::class),
        optional: true
    )]
    public ?array $corporateBonds;

    /** @var null|list<DematMutualFund> $dematMutualFunds */
    #[Api(
        'demat_mutual_funds',
        type: new ListOf(DematMutualFund::class),
        optional: true,
    )]
    public ?array $dematMutualFunds;

    /** @var null|list<Equity> $equities */
    #[Api(type: new ListOf(Equity::class), optional: true)]
    public ?array $equities;

    /** @var null|list<GovernmentSecurity> $governmentSecurities */
    #[Api(
        'government_securities',
        type: new ListOf(GovernmentSecurity::class),
        optional: true,
    )]
    public ?array $governmentSecurities;

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
     * @param null|list<Aif> $aifs
     * @param null|list<CorporateBond> $corporateBonds
     * @param null|list<DematMutualFund> $dematMutualFunds
     * @param null|list<Equity> $equities
     * @param null|list<GovernmentSecurity> $governmentSecurities
     */
    public static function with(
        ?array $aifs = null,
        ?array $corporateBonds = null,
        ?array $dematMutualFunds = null,
        ?array $equities = null,
        ?array $governmentSecurities = null,
    ): self {
        $obj = new self;

        null !== $aifs && $obj->aifs = $aifs;
        null !== $corporateBonds && $obj->corporateBonds = $corporateBonds;
        null !== $dematMutualFunds && $obj->dematMutualFunds = $dematMutualFunds;
        null !== $equities && $obj->equities = $equities;
        null !== $governmentSecurities && $obj->governmentSecurities = $governmentSecurities;

        return $obj;
    }

    /**
     * @param list<Aif> $aifs
     */
    public function withAifs(array $aifs): self
    {
        $obj = clone $this;
        $obj->aifs = $aifs;

        return $obj;
    }

    /**
     * @param list<CorporateBond> $corporateBonds
     */
    public function withCorporateBonds(array $corporateBonds): self
    {
        $obj = clone $this;
        $obj->corporateBonds = $corporateBonds;

        return $obj;
    }

    /**
     * @param list<DematMutualFund> $dematMutualFunds
     */
    public function withDematMutualFunds(array $dematMutualFunds): self
    {
        $obj = clone $this;
        $obj->dematMutualFunds = $dematMutualFunds;

        return $obj;
    }

    /**
     * @param list<Equity> $equities
     */
    public function withEquities(array $equities): self
    {
        $obj = clone $this;
        $obj->equities = $equities;

        return $obj;
    }

    /**
     * @param list<GovernmentSecurity> $governmentSecurities
     */
    public function withGovernmentSecurities(array $governmentSecurities): self
    {
        $obj = clone $this;
        $obj->governmentSecurities = $governmentSecurities;

        return $obj;
    }
}
