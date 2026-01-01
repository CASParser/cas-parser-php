<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse\MutualFund\Scheme;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type GainShape = array{absolute?: float|null, percentage?: float|null}
 */
final class Gain implements BaseModel
{
    /** @use SdkModel<GainShape> */
    use SdkModel;

    /**
     * Absolute gain or loss.
     */
    #[Optional]
    public ?float $absolute;

    /**
     * Percentage gain or loss.
     */
    #[Optional]
    public ?float $percentage;

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
        ?float $absolute = null,
        ?float $percentage = null
    ): self {
        $self = new self;

        null !== $absolute && $self['absolute'] = $absolute;
        null !== $percentage && $self['percentage'] = $percentage;

        return $self;
    }

    /**
     * Absolute gain or loss.
     */
    public function withAbsolute(float $absolute): self
    {
        $self = clone $this;
        $self['absolute'] = $absolute;

        return $self;
    }

    /**
     * Percentage gain or loss.
     */
    public function withPercentage(float $percentage): self
    {
        $self = clone $this;
        $self['percentage'] = $percentage;

        return $self;
    }
}
