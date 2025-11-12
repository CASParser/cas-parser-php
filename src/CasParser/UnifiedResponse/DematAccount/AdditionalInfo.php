<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse\DematAccount;

use CasParser\Core\Attributes\Api;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * Additional information specific to the demat account type.
 *
 * @phpstan-type AdditionalInfoShape = array{
 *   bo_status?: string|null,
 *   bo_sub_status?: string|null,
 *   bo_type?: string|null,
 *   bsda?: string|null,
 *   email?: string|null,
 *   linked_pans?: list<string>|null,
 *   nominee?: string|null,
 *   status?: string|null,
 * }
 */
final class AdditionalInfo implements BaseModel
{
    /** @use SdkModel<AdditionalInfoShape> */
    use SdkModel;

    /**
     * Beneficiary Owner status (CDSL).
     */
    #[Api(optional: true)]
    public ?string $bo_status;

    /**
     * Beneficiary Owner sub-status (CDSL).
     */
    #[Api(optional: true)]
    public ?string $bo_sub_status;

    /**
     * Beneficiary Owner type (CDSL).
     */
    #[Api(optional: true)]
    public ?string $bo_type;

    /**
     * Basic Services Demat Account status (CDSL).
     */
    #[Api(optional: true)]
    public ?string $bsda;

    /**
     * Email associated with the demat account (CDSL).
     */
    #[Api(optional: true)]
    public ?string $email;

    /**
     * List of linked PAN numbers (NSDL).
     *
     * @var list<string>|null $linked_pans
     */
    #[Api(list: 'string', optional: true)]
    public ?array $linked_pans;

    /**
     * Nominee details (CDSL).
     */
    #[Api(optional: true)]
    public ?string $nominee;

    /**
     * Account status (CDSL).
     */
    #[Api(optional: true)]
    public ?string $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $linked_pans
     */
    public static function with(
        ?string $bo_status = null,
        ?string $bo_sub_status = null,
        ?string $bo_type = null,
        ?string $bsda = null,
        ?string $email = null,
        ?array $linked_pans = null,
        ?string $nominee = null,
        ?string $status = null,
    ): self {
        $obj = new self;

        null !== $bo_status && $obj->bo_status = $bo_status;
        null !== $bo_sub_status && $obj->bo_sub_status = $bo_sub_status;
        null !== $bo_type && $obj->bo_type = $bo_type;
        null !== $bsda && $obj->bsda = $bsda;
        null !== $email && $obj->email = $email;
        null !== $linked_pans && $obj->linked_pans = $linked_pans;
        null !== $nominee && $obj->nominee = $nominee;
        null !== $status && $obj->status = $status;

        return $obj;
    }

    /**
     * Beneficiary Owner status (CDSL).
     */
    public function withBoStatus(string $boStatus): self
    {
        $obj = clone $this;
        $obj->bo_status = $boStatus;

        return $obj;
    }

    /**
     * Beneficiary Owner sub-status (CDSL).
     */
    public function withBoSubStatus(string $boSubStatus): self
    {
        $obj = clone $this;
        $obj->bo_sub_status = $boSubStatus;

        return $obj;
    }

    /**
     * Beneficiary Owner type (CDSL).
     */
    public function withBoType(string $boType): self
    {
        $obj = clone $this;
        $obj->bo_type = $boType;

        return $obj;
    }

    /**
     * Basic Services Demat Account status (CDSL).
     */
    public function withBsda(string $bsda): self
    {
        $obj = clone $this;
        $obj->bsda = $bsda;

        return $obj;
    }

    /**
     * Email associated with the demat account (CDSL).
     */
    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj->email = $email;

        return $obj;
    }

    /**
     * List of linked PAN numbers (NSDL).
     *
     * @param list<string> $linkedPans
     */
    public function withLinkedPans(array $linkedPans): self
    {
        $obj = clone $this;
        $obj->linked_pans = $linkedPans;

        return $obj;
    }

    /**
     * Nominee details (CDSL).
     */
    public function withNominee(string $nominee): self
    {
        $obj = clone $this;
        $obj->nominee = $nominee;

        return $obj;
    }

    /**
     * Account status (CDSL).
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }
}
