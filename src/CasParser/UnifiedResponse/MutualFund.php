<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse;

use CasParser\CasParser\UnifiedResponse\MutualFund\AdditionalInfo;
use CasParser\CasParser\UnifiedResponse\MutualFund\LinkedHolder;
use CasParser\CasParser\UnifiedResponse\MutualFund\Scheme;
use CasParser\Core\Attributes\Api;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type MutualFundShape = array{
 *   additional_info?: AdditionalInfo|null,
 *   amc?: string|null,
 *   folio_number?: string|null,
 *   linked_holders?: list<LinkedHolder>|null,
 *   registrar?: string|null,
 *   schemes?: list<Scheme>|null,
 *   value?: float|null,
 * }
 */
final class MutualFund implements BaseModel
{
    /** @use SdkModel<MutualFundShape> */
    use SdkModel;

    /**
     * Additional folio information.
     */
    #[Api(optional: true)]
    public ?AdditionalInfo $additional_info;

    /**
     * Asset Management Company name.
     */
    #[Api(optional: true)]
    public ?string $amc;

    /**
     * Folio number.
     */
    #[Api(optional: true)]
    public ?string $folio_number;

    /**
     * List of account holders linked to this mutual fund folio.
     *
     * @var list<LinkedHolder>|null $linked_holders
     */
    #[Api(list: LinkedHolder::class, optional: true)]
    public ?array $linked_holders;

    /**
     * Registrar and Transfer Agent name.
     */
    #[Api(optional: true)]
    public ?string $registrar;

    /** @var list<Scheme>|null $schemes */
    #[Api(list: Scheme::class, optional: true)]
    public ?array $schemes;

    /**
     * Total value of the folio.
     */
    #[Api(optional: true)]
    public ?float $value;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<LinkedHolder> $linked_holders
     * @param list<Scheme> $schemes
     */
    public static function with(
        ?AdditionalInfo $additional_info = null,
        ?string $amc = null,
        ?string $folio_number = null,
        ?array $linked_holders = null,
        ?string $registrar = null,
        ?array $schemes = null,
        ?float $value = null,
    ): self {
        $obj = new self;

        null !== $additional_info && $obj->additional_info = $additional_info;
        null !== $amc && $obj->amc = $amc;
        null !== $folio_number && $obj->folio_number = $folio_number;
        null !== $linked_holders && $obj->linked_holders = $linked_holders;
        null !== $registrar && $obj->registrar = $registrar;
        null !== $schemes && $obj->schemes = $schemes;
        null !== $value && $obj->value = $value;

        return $obj;
    }

    /**
     * Additional folio information.
     */
    public function withAdditionalInfo(AdditionalInfo $additionalInfo): self
    {
        $obj = clone $this;
        $obj->additional_info = $additionalInfo;

        return $obj;
    }

    /**
     * Asset Management Company name.
     */
    public function withAmc(string $amc): self
    {
        $obj = clone $this;
        $obj->amc = $amc;

        return $obj;
    }

    /**
     * Folio number.
     */
    public function withFolioNumber(string $folioNumber): self
    {
        $obj = clone $this;
        $obj->folio_number = $folioNumber;

        return $obj;
    }

    /**
     * List of account holders linked to this mutual fund folio.
     *
     * @param list<LinkedHolder> $linkedHolders
     */
    public function withLinkedHolders(array $linkedHolders): self
    {
        $obj = clone $this;
        $obj->linked_holders = $linkedHolders;

        return $obj;
    }

    /**
     * Registrar and Transfer Agent name.
     */
    public function withRegistrar(string $registrar): self
    {
        $obj = clone $this;
        $obj->registrar = $registrar;

        return $obj;
    }

    /**
     * @param list<Scheme> $schemes
     */
    public function withSchemes(array $schemes): self
    {
        $obj = clone $this;
        $obj->schemes = $schemes;

        return $obj;
    }

    /**
     * Total value of the folio.
     */
    public function withValue(float $value): self
    {
        $obj = clone $this;
        $obj->value = $value;

        return $obj;
    }
}
