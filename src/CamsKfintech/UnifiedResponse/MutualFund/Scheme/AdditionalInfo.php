<?php

declare(strict_types=1);

namespace CasParser\CamsKfintech\UnifiedResponse\MutualFund\Scheme;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * Additional information specific to the scheme.
 *
 * @phpstan-type AdditionalInfoShape = array{
 *   advisor?: string|null,
 *   amfi?: string|null,
 *   closeUnits?: float|null,
 *   openUnits?: float|null,
 *   rtaCode?: string|null,
 * }
 */
final class AdditionalInfo implements BaseModel
{
    /** @use SdkModel<AdditionalInfoShape> */
    use SdkModel;

    /**
     * Financial advisor name (CAMS/KFintech).
     */
    #[Optional]
    public ?string $advisor;

    /**
     * AMFI code for the scheme (CAMS/KFintech).
     */
    #[Optional]
    public ?string $amfi;

    /**
     * Closing balance units for the statement period.
     */
    #[Optional('close_units', nullable: true)]
    public ?float $closeUnits;

    /**
     * Opening balance units for the statement period.
     */
    #[Optional('open_units', nullable: true)]
    public ?float $openUnits;

    /**
     * RTA code for the scheme (CAMS/KFintech).
     */
    #[Optional('rta_code')]
    public ?string $rtaCode;

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
        ?string $advisor = null,
        ?string $amfi = null,
        ?float $closeUnits = null,
        ?float $openUnits = null,
        ?string $rtaCode = null,
    ): self {
        $self = new self;

        null !== $advisor && $self['advisor'] = $advisor;
        null !== $amfi && $self['amfi'] = $amfi;
        null !== $closeUnits && $self['closeUnits'] = $closeUnits;
        null !== $openUnits && $self['openUnits'] = $openUnits;
        null !== $rtaCode && $self['rtaCode'] = $rtaCode;

        return $self;
    }

    /**
     * Financial advisor name (CAMS/KFintech).
     */
    public function withAdvisor(string $advisor): self
    {
        $self = clone $this;
        $self['advisor'] = $advisor;

        return $self;
    }

    /**
     * AMFI code for the scheme (CAMS/KFintech).
     */
    public function withAmfi(string $amfi): self
    {
        $self = clone $this;
        $self['amfi'] = $amfi;

        return $self;
    }

    /**
     * Closing balance units for the statement period.
     */
    public function withCloseUnits(?float $closeUnits): self
    {
        $self = clone $this;
        $self['closeUnits'] = $closeUnits;

        return $self;
    }

    /**
     * Opening balance units for the statement period.
     */
    public function withOpenUnits(?float $openUnits): self
    {
        $self = clone $this;
        $self['openUnits'] = $openUnits;

        return $self;
    }

    /**
     * RTA code for the scheme (CAMS/KFintech).
     */
    public function withRtaCode(string $rtaCode): self
    {
        $self = clone $this;
        $self['rtaCode'] = $rtaCode;

        return $self;
    }
}
