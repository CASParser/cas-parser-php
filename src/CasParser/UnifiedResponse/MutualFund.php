<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse;

use CasParser\CasParser\UnifiedResponse\MutualFund\AdditionalInfo;
use CasParser\CasParser\UnifiedResponse\MutualFund\LinkedHolder;
use CasParser\CasParser\UnifiedResponse\MutualFund\Scheme;
use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AdditionalInfoShape from \CasParser\CasParser\UnifiedResponse\MutualFund\AdditionalInfo
 * @phpstan-import-type LinkedHolderShape from \CasParser\CasParser\UnifiedResponse\MutualFund\LinkedHolder
 * @phpstan-import-type SchemeShape from \CasParser\CasParser\UnifiedResponse\MutualFund\Scheme
 *
 * @phpstan-type MutualFundShape = array{
 *   additionalInfo?: null|AdditionalInfo|AdditionalInfoShape,
 *   amc?: string|null,
 *   folioNumber?: string|null,
 *   linkedHolders?: list<LinkedHolder|LinkedHolderShape>|null,
 *   registrar?: string|null,
 *   schemes?: list<Scheme|SchemeShape>|null,
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
    #[Optional('additional_info')]
    public ?AdditionalInfo $additionalInfo;

    /**
     * Asset Management Company name.
     */
    #[Optional]
    public ?string $amc;

    /**
     * Folio number.
     */
    #[Optional('folio_number')]
    public ?string $folioNumber;

    /**
     * List of account holders linked to this mutual fund folio.
     *
     * @var list<LinkedHolder>|null $linkedHolders
     */
    #[Optional('linked_holders', list: LinkedHolder::class)]
    public ?array $linkedHolders;

    /**
     * Registrar and Transfer Agent name.
     */
    #[Optional]
    public ?string $registrar;

    /** @var list<Scheme>|null $schemes */
    #[Optional(list: Scheme::class)]
    public ?array $schemes;

    /**
     * Total value of the folio.
     */
    #[Optional]
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
     * @param AdditionalInfo|AdditionalInfoShape|null $additionalInfo
     * @param list<LinkedHolder|LinkedHolderShape>|null $linkedHolders
     * @param list<Scheme|SchemeShape>|null $schemes
     */
    public static function with(
        AdditionalInfo|array|null $additionalInfo = null,
        ?string $amc = null,
        ?string $folioNumber = null,
        ?array $linkedHolders = null,
        ?string $registrar = null,
        ?array $schemes = null,
        ?float $value = null,
    ): self {
        $self = new self;

        null !== $additionalInfo && $self['additionalInfo'] = $additionalInfo;
        null !== $amc && $self['amc'] = $amc;
        null !== $folioNumber && $self['folioNumber'] = $folioNumber;
        null !== $linkedHolders && $self['linkedHolders'] = $linkedHolders;
        null !== $registrar && $self['registrar'] = $registrar;
        null !== $schemes && $self['schemes'] = $schemes;
        null !== $value && $self['value'] = $value;

        return $self;
    }

    /**
     * Additional folio information.
     *
     * @param AdditionalInfo|AdditionalInfoShape $additionalInfo
     */
    public function withAdditionalInfo(
        AdditionalInfo|array $additionalInfo
    ): self {
        $self = clone $this;
        $self['additionalInfo'] = $additionalInfo;

        return $self;
    }

    /**
     * Asset Management Company name.
     */
    public function withAmc(string $amc): self
    {
        $self = clone $this;
        $self['amc'] = $amc;

        return $self;
    }

    /**
     * Folio number.
     */
    public function withFolioNumber(string $folioNumber): self
    {
        $self = clone $this;
        $self['folioNumber'] = $folioNumber;

        return $self;
    }

    /**
     * List of account holders linked to this mutual fund folio.
     *
     * @param list<LinkedHolder|LinkedHolderShape> $linkedHolders
     */
    public function withLinkedHolders(array $linkedHolders): self
    {
        $self = clone $this;
        $self['linkedHolders'] = $linkedHolders;

        return $self;
    }

    /**
     * Registrar and Transfer Agent name.
     */
    public function withRegistrar(string $registrar): self
    {
        $self = clone $this;
        $self['registrar'] = $registrar;

        return $self;
    }

    /**
     * @param list<Scheme|SchemeShape> $schemes
     */
    public function withSchemes(array $schemes): self
    {
        $self = clone $this;
        $self['schemes'] = $schemes;

        return $self;
    }

    /**
     * Total value of the folio.
     */
    public function withValue(float $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
