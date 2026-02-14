<?php

declare(strict_types=1);

namespace CasParser\CamsKfintech\UnifiedResponse;

use CasParser\CamsKfintech\LinkedHolder;
use CasParser\CamsKfintech\UnifiedResponse\DematAccount\AdditionalInfo;
use CasParser\CamsKfintech\UnifiedResponse\DematAccount\DematType;
use CasParser\CamsKfintech\UnifiedResponse\DematAccount\Holdings;
use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AdditionalInfoShape from \CasParser\CamsKfintech\UnifiedResponse\DematAccount\AdditionalInfo
 * @phpstan-import-type HoldingsShape from \CasParser\CamsKfintech\UnifiedResponse\DematAccount\Holdings
 * @phpstan-import-type LinkedHolderShape from \CasParser\CamsKfintech\LinkedHolder
 *
 * @phpstan-type DematAccountShape = array{
 *   additionalInfo?: null|AdditionalInfo|AdditionalInfoShape,
 *   boID?: string|null,
 *   clientID?: string|null,
 *   dematType?: null|DematType|value-of<DematType>,
 *   dpID?: string|null,
 *   dpName?: string|null,
 *   holdings?: null|Holdings|HoldingsShape,
 *   linkedHolders?: list<LinkedHolder|LinkedHolderShape>|null,
 *   value?: float|null,
 * }
 */
final class DematAccount implements BaseModel
{
    /** @use SdkModel<DematAccountShape> */
    use SdkModel;

    /**
     * Additional information specific to the demat account type.
     */
    #[Optional('additional_info')]
    public ?AdditionalInfo $additionalInfo;

    /**
     * Beneficiary Owner ID (primarily for CDSL).
     */
    #[Optional('bo_id')]
    public ?string $boID;

    /**
     * Client ID.
     */
    #[Optional('client_id')]
    public ?string $clientID;

    /**
     * Type of demat account.
     *
     * @var value-of<DematType>|null $dematType
     */
    #[Optional('demat_type', enum: DematType::class)]
    public ?string $dematType;

    /**
     * Depository Participant ID.
     */
    #[Optional('dp_id')]
    public ?string $dpID;

    /**
     * Depository Participant name.
     */
    #[Optional('dp_name')]
    public ?string $dpName;

    #[Optional]
    public ?Holdings $holdings;

    /**
     * List of account holders linked to this demat account.
     *
     * @var list<LinkedHolder>|null $linkedHolders
     */
    #[Optional('linked_holders', list: LinkedHolder::class)]
    public ?array $linkedHolders;

    /**
     * Total value of the demat account.
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
     * @param DematType|value-of<DematType>|null $dematType
     * @param Holdings|HoldingsShape|null $holdings
     * @param list<LinkedHolder|LinkedHolderShape>|null $linkedHolders
     */
    public static function with(
        AdditionalInfo|array|null $additionalInfo = null,
        ?string $boID = null,
        ?string $clientID = null,
        DematType|string|null $dematType = null,
        ?string $dpID = null,
        ?string $dpName = null,
        Holdings|array|null $holdings = null,
        ?array $linkedHolders = null,
        ?float $value = null,
    ): self {
        $self = new self;

        null !== $additionalInfo && $self['additionalInfo'] = $additionalInfo;
        null !== $boID && $self['boID'] = $boID;
        null !== $clientID && $self['clientID'] = $clientID;
        null !== $dematType && $self['dematType'] = $dematType;
        null !== $dpID && $self['dpID'] = $dpID;
        null !== $dpName && $self['dpName'] = $dpName;
        null !== $holdings && $self['holdings'] = $holdings;
        null !== $linkedHolders && $self['linkedHolders'] = $linkedHolders;
        null !== $value && $self['value'] = $value;

        return $self;
    }

    /**
     * Additional information specific to the demat account type.
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
     * Beneficiary Owner ID (primarily for CDSL).
     */
    public function withBoID(string $boID): self
    {
        $self = clone $this;
        $self['boID'] = $boID;

        return $self;
    }

    /**
     * Client ID.
     */
    public function withClientID(string $clientID): self
    {
        $self = clone $this;
        $self['clientID'] = $clientID;

        return $self;
    }

    /**
     * Type of demat account.
     *
     * @param DematType|value-of<DematType> $dematType
     */
    public function withDematType(DematType|string $dematType): self
    {
        $self = clone $this;
        $self['dematType'] = $dematType;

        return $self;
    }

    /**
     * Depository Participant ID.
     */
    public function withDpID(string $dpID): self
    {
        $self = clone $this;
        $self['dpID'] = $dpID;

        return $self;
    }

    /**
     * Depository Participant name.
     */
    public function withDpName(string $dpName): self
    {
        $self = clone $this;
        $self['dpName'] = $dpName;

        return $self;
    }

    /**
     * @param Holdings|HoldingsShape $holdings
     */
    public function withHoldings(Holdings|array $holdings): self
    {
        $self = clone $this;
        $self['holdings'] = $holdings;

        return $self;
    }

    /**
     * List of account holders linked to this demat account.
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
     * Total value of the demat account.
     */
    public function withValue(float $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
