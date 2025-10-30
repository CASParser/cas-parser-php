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
 *   boStatus?: string,
 *   boSubStatus?: string,
 *   boType?: string,
 *   bsda?: string,
 *   email?: string,
 *   linkedPans?: list<string>,
 *   nominee?: string,
 *   status?: string,
 * }
 */
final class AdditionalInfo implements BaseModel
{
    /** @use SdkModel<AdditionalInfoShape> */
    use SdkModel;

    /**
     * Beneficiary Owner status (CDSL).
     */
    #[Api('bo_status', optional: true)]
    public ?string $boStatus;

    /**
     * Beneficiary Owner sub-status (CDSL).
     */
    #[Api('bo_sub_status', optional: true)]
    public ?string $boSubStatus;

    /**
     * Beneficiary Owner type (CDSL).
     */
    #[Api('bo_type', optional: true)]
    public ?string $boType;

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
     * @var list<string>|null $linkedPans
     */
    #[Api('linked_pans', list: 'string', optional: true)]
    public ?array $linkedPans;

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
     * @param list<string> $linkedPans
     */
    public static function with(
        ?string $boStatus = null,
        ?string $boSubStatus = null,
        ?string $boType = null,
        ?string $bsda = null,
        ?string $email = null,
        ?array $linkedPans = null,
        ?string $nominee = null,
        ?string $status = null,
    ): self {
        $obj = new self;

        null !== $boStatus && $obj->boStatus = $boStatus;
        null !== $boSubStatus && $obj->boSubStatus = $boSubStatus;
        null !== $boType && $obj->boType = $boType;
        null !== $bsda && $obj->bsda = $bsda;
        null !== $email && $obj->email = $email;
        null !== $linkedPans && $obj->linkedPans = $linkedPans;
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
        $obj->boStatus = $boStatus;

        return $obj;
    }

    /**
     * Beneficiary Owner sub-status (CDSL).
     */
    public function withBoSubStatus(string $boSubStatus): self
    {
        $obj = clone $this;
        $obj->boSubStatus = $boSubStatus;

        return $obj;
    }

    /**
     * Beneficiary Owner type (CDSL).
     */
    public function withBoType(string $boType): self
    {
        $obj = clone $this;
        $obj->boType = $boType;

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
        $obj->linkedPans = $linkedPans;

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
