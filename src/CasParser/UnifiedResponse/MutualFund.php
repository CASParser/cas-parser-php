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
 *   additionalInfo?: AdditionalInfo,
 *   amc?: string,
 *   folioNumber?: string,
 *   linkedHolders?: list<LinkedHolder>,
 *   registrar?: string,
 *   schemes?: list<Scheme>,
 *   value?: float,
 * }
 */
final class MutualFund implements BaseModel
{
    /** @use SdkModel<MutualFundShape> */
    use SdkModel;

    /**
     * Additional folio information.
     */
    #[Api('additional_info', optional: true)]
    public ?AdditionalInfo $additionalInfo;

    /**
     * Asset Management Company name.
     */
    #[Api(optional: true)]
    public ?string $amc;

    /**
     * Folio number.
     */
    #[Api('folio_number', optional: true)]
    public ?string $folioNumber;

    /**
     * List of account holders linked to this mutual fund folio.
     *
     * @var list<LinkedHolder>|null $linkedHolders
     */
    #[Api('linked_holders', list: LinkedHolder::class, optional: true)]
    public ?array $linkedHolders;

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
     * @param list<LinkedHolder> $linkedHolders
     * @param list<Scheme> $schemes
     */
    public static function with(
        ?AdditionalInfo $additionalInfo = null,
        ?string $amc = null,
        ?string $folioNumber = null,
        ?array $linkedHolders = null,
        ?string $registrar = null,
        ?array $schemes = null,
        ?float $value = null,
    ): self {
        $obj = new self;

        null !== $additionalInfo && $obj->additionalInfo = $additionalInfo;
        null !== $amc && $obj->amc = $amc;
        null !== $folioNumber && $obj->folioNumber = $folioNumber;
        null !== $linkedHolders && $obj->linkedHolders = $linkedHolders;
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
        $obj->additionalInfo = $additionalInfo;

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
        $obj->folioNumber = $folioNumber;

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
        $obj->linkedHolders = $linkedHolders;

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
