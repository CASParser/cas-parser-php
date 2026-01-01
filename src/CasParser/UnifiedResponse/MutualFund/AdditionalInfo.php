<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse\MutualFund;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * Additional folio information.
 *
 * @phpstan-type AdditionalInfoShape = array{
 *   kyc?: string|null, pan?: string|null, pankyc?: string|null
 * }
 */
final class AdditionalInfo implements BaseModel
{
    /** @use SdkModel<AdditionalInfoShape> */
    use SdkModel;

    /**
     * KYC status of the folio.
     */
    #[Optional]
    public ?string $kyc;

    /**
     * PAN associated with the folio.
     */
    #[Optional]
    public ?string $pan;

    /**
     * PAN KYC status.
     */
    #[Optional]
    public ?string $pankyc;

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
        ?string $kyc = null,
        ?string $pan = null,
        ?string $pankyc = null
    ): self {
        $self = new self;

        null !== $kyc && $self['kyc'] = $kyc;
        null !== $pan && $self['pan'] = $pan;
        null !== $pankyc && $self['pankyc'] = $pankyc;

        return $self;
    }

    /**
     * KYC status of the folio.
     */
    public function withKYC(string $kyc): self
    {
        $self = clone $this;
        $self['kyc'] = $kyc;

        return $self;
    }

    /**
     * PAN associated with the folio.
     */
    public function withPan(string $pan): self
    {
        $self = clone $this;
        $self['pan'] = $pan;

        return $self;
    }

    /**
     * PAN KYC status.
     */
    public function withPankyc(string $pankyc): self
    {
        $self = clone $this;
        $self['pankyc'] = $pankyc;

        return $self;
    }
}
