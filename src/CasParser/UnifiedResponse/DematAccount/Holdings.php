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

/**
 * @phpstan-type HoldingsShape = array{
 *   aifs?: list<Aif>|null,
 *   corporate_bonds?: list<CorporateBond>|null,
 *   demat_mutual_funds?: list<DematMutualFund>|null,
 *   equities?: list<Equity>|null,
 *   government_securities?: list<GovernmentSecurity>|null,
 * }
 */
final class Holdings implements BaseModel
{
    /** @use SdkModel<HoldingsShape> */
    use SdkModel;

    /** @var list<Aif>|null $aifs */
    #[Api(list: Aif::class, optional: true)]
    public ?array $aifs;

    /** @var list<CorporateBond>|null $corporate_bonds */
    #[Api(list: CorporateBond::class, optional: true)]
    public ?array $corporate_bonds;

    /** @var list<DematMutualFund>|null $demat_mutual_funds */
    #[Api(list: DematMutualFund::class, optional: true)]
    public ?array $demat_mutual_funds;

    /** @var list<Equity>|null $equities */
    #[Api(list: Equity::class, optional: true)]
    public ?array $equities;

    /** @var list<GovernmentSecurity>|null $government_securities */
    #[Api(list: GovernmentSecurity::class, optional: true)]
    public ?array $government_securities;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Aif> $aifs
     * @param list<CorporateBond> $corporate_bonds
     * @param list<DematMutualFund> $demat_mutual_funds
     * @param list<Equity> $equities
     * @param list<GovernmentSecurity> $government_securities
     */
    public static function with(
        ?array $aifs = null,
        ?array $corporate_bonds = null,
        ?array $demat_mutual_funds = null,
        ?array $equities = null,
        ?array $government_securities = null,
    ): self {
        $obj = new self;

        null !== $aifs && $obj->aifs = $aifs;
        null !== $corporate_bonds && $obj->corporate_bonds = $corporate_bonds;
        null !== $demat_mutual_funds && $obj->demat_mutual_funds = $demat_mutual_funds;
        null !== $equities && $obj->equities = $equities;
        null !== $government_securities && $obj->government_securities = $government_securities;

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
        $obj->corporate_bonds = $corporateBonds;

        return $obj;
    }

    /**
     * @param list<DematMutualFund> $dematMutualFunds
     */
    public function withDematMutualFunds(array $dematMutualFunds): self
    {
        $obj = clone $this;
        $obj->demat_mutual_funds = $dematMutualFunds;

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
        $obj->government_securities = $governmentSecurities;

        return $obj;
    }
}
