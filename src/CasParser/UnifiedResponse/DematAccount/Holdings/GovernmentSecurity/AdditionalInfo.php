<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse\DematAccount\Holdings\GovernmentSecurity;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * Additional information specific to the government security.
 *
 * @phpstan-type AdditionalInfoShape = array{
 *   closeUnits?: float|null, openUnits?: float|null
 * }
 */
final class AdditionalInfo implements BaseModel
{
    /** @use SdkModel<AdditionalInfoShape> */
    use SdkModel;

    /**
     * Closing balance units for the statement period (beta).
     */
    #[Optional('close_units', nullable: true)]
    public ?float $closeUnits;

    /**
     * Opening balance units for the statement period (beta).
     */
    #[Optional('open_units', nullable: true)]
    public ?float $openUnits;

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
        ?float $closeUnits = null,
        ?float $openUnits = null
    ): self {
        $self = new self;

        null !== $closeUnits && $self['closeUnits'] = $closeUnits;
        null !== $openUnits && $self['openUnits'] = $openUnits;

        return $self;
    }

    /**
     * Closing balance units for the statement period (beta).
     */
    public function withCloseUnits(?float $closeUnits): self
    {
        $self = clone $this;
        $self['closeUnits'] = $closeUnits;

        return $self;
    }

    /**
     * Opening balance units for the statement period (beta).
     */
    public function withOpenUnits(?float $openUnits): self
    {
        $self = clone $this;
        $self['openUnits'] = $openUnits;

        return $self;
    }
}
