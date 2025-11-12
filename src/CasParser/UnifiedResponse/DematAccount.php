<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse;

use CasParser\CasParser\UnifiedResponse\DematAccount\AdditionalInfo;
use CasParser\CasParser\UnifiedResponse\DematAccount\DematType;
use CasParser\CasParser\UnifiedResponse\DematAccount\Holdings;
use CasParser\CasParser\UnifiedResponse\DematAccount\LinkedHolder;
use CasParser\Core\Attributes\Api;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type DematAccountShape = array{
 *   additional_info?: AdditionalInfo|null,
 *   bo_id?: string|null,
 *   client_id?: string|null,
 *   demat_type?: value-of<DematType>|null,
 *   dp_id?: string|null,
 *   dp_name?: string|null,
 *   holdings?: Holdings|null,
 *   linked_holders?: list<LinkedHolder>|null,
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
    #[Api(optional: true)]
    public ?AdditionalInfo $additional_info;

    /**
     * Beneficiary Owner ID (primarily for CDSL).
     */
    #[Api(optional: true)]
    public ?string $bo_id;

    /**
     * Client ID.
     */
    #[Api(optional: true)]
    public ?string $client_id;

    /**
     * Type of demat account.
     *
     * @var value-of<DematType>|null $demat_type
     */
    #[Api(enum: DematType::class, optional: true)]
    public ?string $demat_type;

    /**
     * Depository Participant ID.
     */
    #[Api(optional: true)]
    public ?string $dp_id;

    /**
     * Depository Participant name.
     */
    #[Api(optional: true)]
    public ?string $dp_name;

    #[Api(optional: true)]
    public ?Holdings $holdings;

    /**
     * List of account holders linked to this demat account.
     *
     * @var list<LinkedHolder>|null $linked_holders
     */
    #[Api(list: LinkedHolder::class, optional: true)]
    public ?array $linked_holders;

    /**
     * Total value of the demat account.
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
     * @param DematType|value-of<DematType> $demat_type
     * @param list<LinkedHolder> $linked_holders
     */
    public static function with(
        ?AdditionalInfo $additional_info = null,
        ?string $bo_id = null,
        ?string $client_id = null,
        DematType|string|null $demat_type = null,
        ?string $dp_id = null,
        ?string $dp_name = null,
        ?Holdings $holdings = null,
        ?array $linked_holders = null,
        ?float $value = null,
    ): self {
        $obj = new self;

        null !== $additional_info && $obj->additional_info = $additional_info;
        null !== $bo_id && $obj->bo_id = $bo_id;
        null !== $client_id && $obj->client_id = $client_id;
        null !== $demat_type && $obj['demat_type'] = $demat_type;
        null !== $dp_id && $obj->dp_id = $dp_id;
        null !== $dp_name && $obj->dp_name = $dp_name;
        null !== $holdings && $obj->holdings = $holdings;
        null !== $linked_holders && $obj->linked_holders = $linked_holders;
        null !== $value && $obj->value = $value;

        return $obj;
    }

    /**
     * Additional information specific to the demat account type.
     */
    public function withAdditionalInfo(AdditionalInfo $additionalInfo): self
    {
        $obj = clone $this;
        $obj->additional_info = $additionalInfo;

        return $obj;
    }

    /**
     * Beneficiary Owner ID (primarily for CDSL).
     */
    public function withBoID(string $boID): self
    {
        $obj = clone $this;
        $obj->bo_id = $boID;

        return $obj;
    }

    /**
     * Client ID.
     */
    public function withClientID(string $clientID): self
    {
        $obj = clone $this;
        $obj->client_id = $clientID;

        return $obj;
    }

    /**
     * Type of demat account.
     *
     * @param DematType|value-of<DematType> $dematType
     */
    public function withDematType(DematType|string $dematType): self
    {
        $obj = clone $this;
        $obj['demat_type'] = $dematType;

        return $obj;
    }

    /**
     * Depository Participant ID.
     */
    public function withDpID(string $dpID): self
    {
        $obj = clone $this;
        $obj->dp_id = $dpID;

        return $obj;
    }

    /**
     * Depository Participant name.
     */
    public function withDpName(string $dpName): self
    {
        $obj = clone $this;
        $obj->dp_name = $dpName;

        return $obj;
    }

    public function withHoldings(Holdings $holdings): self
    {
        $obj = clone $this;
        $obj->holdings = $holdings;

        return $obj;
    }

    /**
     * List of account holders linked to this demat account.
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
     * Total value of the demat account.
     */
    public function withValue(float $value): self
    {
        $obj = clone $this;
        $obj->value = $value;

        return $obj;
    }
}
