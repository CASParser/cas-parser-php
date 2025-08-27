<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse;

use CasParser\CasParser\UnifiedResponse\DematAccount\AdditionalInfo;
use CasParser\CasParser\UnifiedResponse\DematAccount\DematType;
use CasParser\CasParser\UnifiedResponse\DematAccount\Holdings;
use CasParser\Core\Attributes\Api;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type demat_account = array{
 *   additionalInfo?: AdditionalInfo|null,
 *   boID?: string|null,
 *   clientID?: string|null,
 *   dematType?: DematType::*|null,
 *   dpID?: string|null,
 *   dpName?: string|null,
 *   holdings?: Holdings|null,
 *   value?: float|null,
 * }
 */
final class DematAccount implements BaseModel
{
    /** @use SdkModel<demat_account> */
    use SdkModel;

    /**
     * Additional information specific to the demat account type.
     */
    #[Api('additional_info', optional: true)]
    public ?AdditionalInfo $additionalInfo;

    /**
     * Beneficiary Owner ID (primarily for CDSL).
     */
    #[Api('bo_id', optional: true)]
    public ?string $boID;

    /**
     * Client ID.
     */
    #[Api('client_id', optional: true)]
    public ?string $clientID;

    /**
     * Type of demat account.
     *
     * @var DematType::*|null $dematType
     */
    #[Api('demat_type', enum: DematType::class, optional: true)]
    public ?string $dematType;

    /**
     * Depository Participant ID.
     */
    #[Api('dp_id', optional: true)]
    public ?string $dpID;

    /**
     * Depository Participant name.
     */
    #[Api('dp_name', optional: true)]
    public ?string $dpName;

    #[Api(optional: true)]
    public ?Holdings $holdings;

    /**
     * Total value of the demat account.
     */
    #[Api(optional: true)]
    public ?float $value;

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
     * @param DematType::* $dematType
     */
    public static function with(
        ?AdditionalInfo $additionalInfo = null,
        ?string $boID = null,
        ?string $clientID = null,
        ?string $dematType = null,
        ?string $dpID = null,
        ?string $dpName = null,
        ?Holdings $holdings = null,
        ?float $value = null,
    ): self {
        $obj = new self;

        null !== $additionalInfo && $obj->additionalInfo = $additionalInfo;
        null !== $boID && $obj->boID = $boID;
        null !== $clientID && $obj->clientID = $clientID;
        null !== $dematType && $obj->dematType = $dematType;
        null !== $dpID && $obj->dpID = $dpID;
        null !== $dpName && $obj->dpName = $dpName;
        null !== $holdings && $obj->holdings = $holdings;
        null !== $value && $obj->value = $value;

        return $obj;
    }

    /**
     * Additional information specific to the demat account type.
     */
    public function withAdditionalInfo(AdditionalInfo $additionalInfo): self
    {
        $obj = clone $this;
        $obj->additionalInfo = $additionalInfo;

        return $obj;
    }

    /**
     * Beneficiary Owner ID (primarily for CDSL).
     */
    public function withBoID(string $boID): self
    {
        $obj = clone $this;
        $obj->boID = $boID;

        return $obj;
    }

    /**
     * Client ID.
     */
    public function withClientID(string $clientID): self
    {
        $obj = clone $this;
        $obj->clientID = $clientID;

        return $obj;
    }

    /**
     * Type of demat account.
     *
     * @param DematType::* $dematType
     */
    public function withDematType(string $dematType): self
    {
        $obj = clone $this;
        $obj->dematType = $dematType;

        return $obj;
    }

    /**
     * Depository Participant ID.
     */
    public function withDpID(string $dpID): self
    {
        $obj = clone $this;
        $obj->dpID = $dpID;

        return $obj;
    }

    /**
     * Depository Participant name.
     */
    public function withDpName(string $dpName): self
    {
        $obj = clone $this;
        $obj->dpName = $dpName;

        return $obj;
    }

    public function withHoldings(Holdings $holdings): self
    {
        $obj = clone $this;
        $obj->holdings = $holdings;

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
