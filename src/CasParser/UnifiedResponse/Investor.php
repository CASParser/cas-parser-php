<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse;

use CasParser\Core\Attributes\Api;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type InvestorShape = array{
 *   address?: string,
 *   casID?: string,
 *   email?: string,
 *   mobile?: string,
 *   name?: string,
 *   pan?: string,
 *   pincode?: string,
 * }
 */
final class Investor implements BaseModel
{
    /** @use SdkModel<InvestorShape> */
    use SdkModel;

    /**
     * Address of the investor.
     */
    #[Api(optional: true)]
    public ?string $address;

    /**
     * CAS ID of the investor (only for NSDL and CDSL).
     */
    #[Api('cas_id', optional: true)]
    public ?string $casID;

    /**
     * Email address of the investor.
     */
    #[Api(optional: true)]
    public ?string $email;

    /**
     * Mobile number of the investor.
     */
    #[Api(optional: true)]
    public ?string $mobile;

    /**
     * Name of the investor.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * PAN (Permanent Account Number) of the investor.
     */
    #[Api(optional: true)]
    public ?string $pan;

    /**
     * Postal code of the investor's address.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        null !== $address && $obj->address = $address;
        null !== $casID && $obj->casID = $casID;
        null !== $email && $obj->email = $email;
        null !== $mobile && $obj->mobile = $mobile;
        null !== $name && $obj->name = $name;
        null !== $pan && $obj->pan = $pan;
        null !== $pincode && $obj->pincode = $pincode;

        return $obj;
    }

    /**
     * Address of the investor.
     */
    public function withAddress(string $address): self
    {
        $obj = clone $this;
        $obj->address = $address;

        return $obj;
    }

    /**
     * CAS ID of the investor (only for NSDL and CDSL).
     */
    public function withCasID(string $casID): self
    {
        $obj = clone $this;
        $obj->casID = $casID;

        return $obj;
    }

    /**
     * Email address of the investor.
     */
    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj->email = $email;

        return $obj;
    }

    /**
     * Mobile number of the investor.
     */
    public function withMobile(string $mobile): self
    {
        $obj = clone $this;
        $obj->mobile = $mobile;

        return $obj;
    }

    /**
     * Name of the investor.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * PAN (Permanent Account Number) of the investor.
     */
    public function withPan(string $pan): self
    {
        $obj = clone $this;
        $obj->pan = $pan;

        return $obj;
    }

    /**
     * Postal code of the investor's address.
     */
    public function withPincode(string $pincode): self
    {
        $obj = clone $this;
        $obj->pincode = $pincode;

        return $obj;
    }
}
