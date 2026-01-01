<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type InvestorShape = array{
 *   address?: string|null,
 *   casID?: string|null,
 *   email?: string|null,
 *   mobile?: string|null,
 *   name?: string|null,
 *   pan?: string|null,
 *   pincode?: string|null,
 * }
 */
final class Investor implements BaseModel
{
    /** @use SdkModel<InvestorShape> */
    use SdkModel;

    /**
     * Address of the investor.
     */
    #[Optional]
    public ?string $address;

    /**
     * CAS ID of the investor (only for NSDL and CDSL).
     */
    #[Optional('cas_id')]
    public ?string $casID;

    /**
     * Email address of the investor.
     */
    #[Optional]
    public ?string $email;

    /**
     * Mobile number of the investor.
     */
    #[Optional]
    public ?string $mobile;

    /**
     * Name of the investor.
     */
    #[Optional]
    public ?string $name;

    /**
     * PAN (Permanent Account Number) of the investor.
     */
    #[Optional]
    public ?string $pan;

    /**
     * Postal code of the investor's address.
     */
    #[Optional]
    public ?string $pincode;

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
        ?string $casID = null,
        ?string $email = null,
        ?string $mobile = null,
        ?string $name = null,
        ?string $pan = null,
        ?string $pincode = null,
    ): self {
        $self = new self;

        null !== $address && $self['address'] = $address;
        null !== $casID && $self['casID'] = $casID;
        null !== $email && $self['email'] = $email;
        null !== $mobile && $self['mobile'] = $mobile;
        null !== $name && $self['name'] = $name;
        null !== $pan && $self['pan'] = $pan;
        null !== $pincode && $self['pincode'] = $pincode;

        return $self;
    }

    /**
     * Address of the investor.
     */
    public function withAddress(string $address): self
    {
        $self = clone $this;
        $self['address'] = $address;

        return $self;
    }

    /**
     * CAS ID of the investor (only for NSDL and CDSL).
     */
    public function withCasID(string $casID): self
    {
        $self = clone $this;
        $self['casID'] = $casID;

        return $self;
    }

    /**
     * Email address of the investor.
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * Mobile number of the investor.
     */
    public function withMobile(string $mobile): self
    {
        $self = clone $this;
        $self['mobile'] = $mobile;

        return $self;
    }

    /**
     * Name of the investor.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * PAN (Permanent Account Number) of the investor.
     */
    public function withPan(string $pan): self
    {
        $self = clone $this;
        $self['pan'] = $pan;

        return $self;
    }

    /**
     * Postal code of the investor's address.
     */
    public function withPincode(string $pincode): self
    {
        $self = clone $this;
        $self['pincode'] = $pincode;

        return $self;
    }
}
