<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse\DematAccount;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * Additional information specific to the demat account type.
 *
 * @phpstan-type AdditionalInfoShape = array{
 *   boStatus?: string|null,
 *   boSubStatus?: string|null,
 *   boType?: string|null,
 *   bsda?: string|null,
 *   email?: string|null,
 *   linkedPans?: list<string>|null,
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
    #[Optional('bo_status')]
    public ?string $boStatus;

    /**
     * Beneficiary Owner sub-status (CDSL).
     */
    #[Optional('bo_sub_status')]
    public ?string $boSubStatus;

    /**
     * Beneficiary Owner type (CDSL).
     */
    #[Optional('bo_type')]
    public ?string $boType;

    /**
     * Basic Services Demat Account status (CDSL).
     */
    #[Optional]
    public ?string $bsda;

    /**
     * Email associated with the demat account (CDSL).
     */
    #[Optional]
    public ?string $email;

    /**
     * List of linked PAN numbers (NSDL).
     *
     * @var list<string>|null $linkedPans
     */
    #[Optional('linked_pans', list: 'string')]
    public ?array $linkedPans;

    /**
     * Nominee details (CDSL).
     */
    #[Optional]
    public ?string $nominee;

    /**
     * Account status (CDSL).
     */
    #[Optional]
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
     * @param list<string>|null $linkedPans
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
        $self = new self;

        null !== $boStatus && $self['boStatus'] = $boStatus;
        null !== $boSubStatus && $self['boSubStatus'] = $boSubStatus;
        null !== $boType && $self['boType'] = $boType;
        null !== $bsda && $self['bsda'] = $bsda;
        null !== $email && $self['email'] = $email;
        null !== $linkedPans && $self['linkedPans'] = $linkedPans;
        null !== $nominee && $self['nominee'] = $nominee;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    /**
     * Beneficiary Owner status (CDSL).
     */
    public function withBoStatus(string $boStatus): self
    {
        $self = clone $this;
        $self['boStatus'] = $boStatus;

        return $self;
    }

    /**
     * Beneficiary Owner sub-status (CDSL).
     */
    public function withBoSubStatus(string $boSubStatus): self
    {
        $self = clone $this;
        $self['boSubStatus'] = $boSubStatus;

        return $self;
    }

    /**
     * Beneficiary Owner type (CDSL).
     */
    public function withBoType(string $boType): self
    {
        $self = clone $this;
        $self['boType'] = $boType;

        return $self;
    }

    /**
     * Basic Services Demat Account status (CDSL).
     */
    public function withBsda(string $bsda): self
    {
        $self = clone $this;
        $self['bsda'] = $bsda;

        return $self;
    }

    /**
     * Email associated with the demat account (CDSL).
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * List of linked PAN numbers (NSDL).
     *
     * @param list<string> $linkedPans
     */
    public function withLinkedPans(array $linkedPans): self
    {
        $self = clone $this;
        $self['linkedPans'] = $linkedPans;

        return $self;
    }

    /**
     * Nominee details (CDSL).
     */
    public function withNominee(string $nominee): self
    {
        $self = clone $this;
        $self['nominee'] = $nominee;

        return $self;
    }

    /**
     * Account status (CDSL).
     */
    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
