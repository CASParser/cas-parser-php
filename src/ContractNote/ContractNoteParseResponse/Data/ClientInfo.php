<?php

declare(strict_types=1);

namespace CasParser\ContractNote\ContractNoteParseResponse\Data;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type ClientInfoShape = array{
 *   address?: string|null,
 *   gstStateCode?: string|null,
 *   name?: string|null,
 *   pan?: string|null,
 *   placeOfSupply?: string|null,
 *   ucc?: string|null,
 * }
 */
final class ClientInfo implements BaseModel
{
    /** @use SdkModel<ClientInfoShape> */
    use SdkModel;

    /**
     * Client address.
     */
    #[Optional]
    public ?string $address;

    /**
     * GST state code.
     */
    #[Optional('gst_state_code')]
    public ?string $gstStateCode;

    /**
     * Client name.
     */
    #[Optional]
    public ?string $name;

    /**
     * Client PAN number.
     */
    #[Optional]
    public ?string $pan;

    /**
     * GST place of supply.
     */
    #[Optional('place_of_supply')]
    public ?string $placeOfSupply;

    /**
     * Unique Client Code.
     */
    #[Optional]
    public ?string $ucc;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $address = null,
        ?string $gstStateCode = null,
        ?string $name = null,
        ?string $pan = null,
        ?string $placeOfSupply = null,
        ?string $ucc = null,
    ): self {
        $self = new self;

        null !== $address && $self['address'] = $address;
        null !== $gstStateCode && $self['gstStateCode'] = $gstStateCode;
        null !== $name && $self['name'] = $name;
        null !== $pan && $self['pan'] = $pan;
        null !== $placeOfSupply && $self['placeOfSupply'] = $placeOfSupply;
        null !== $ucc && $self['ucc'] = $ucc;

        return $self;
    }

    /**
     * Client address.
     */
    public function withAddress(string $address): self
    {
        $self = clone $this;
        $self['address'] = $address;

        return $self;
    }

    /**
     * GST state code.
     */
    public function withGstStateCode(string $gstStateCode): self
    {
        $self = clone $this;
        $self['gstStateCode'] = $gstStateCode;

        return $self;
    }

    /**
     * Client name.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Client PAN number.
     */
    public function withPan(string $pan): self
    {
        $self = clone $this;
        $self['pan'] = $pan;

        return $self;
    }

    /**
     * GST place of supply.
     */
    public function withPlaceOfSupply(string $placeOfSupply): self
    {
        $self = clone $this;
        $self['placeOfSupply'] = $placeOfSupply;

        return $self;
    }

    /**
     * Unique Client Code.
     */
    public function withUcc(string $ucc): self
    {
        $self = clone $this;
        $self['ucc'] = $ucc;

        return $self;
    }
}
