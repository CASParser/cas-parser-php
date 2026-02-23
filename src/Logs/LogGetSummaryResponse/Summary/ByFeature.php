<?php

declare(strict_types=1);

namespace CasParser\Logs\LogGetSummaryResponse\Summary;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type ByFeatureShape = array{
 *   credits?: float|null, feature?: string|null, requests?: int|null
 * }
 */
final class ByFeature implements BaseModel
{
    /** @use SdkModel<ByFeatureShape> */
    use SdkModel;

    /**
     * Credits consumed by this feature.
     */
    #[Optional]
    public ?float $credits;

    /**
     * API feature name.
     */
    #[Optional]
    public ?string $feature;

    /**
     * Number of requests for this feature.
     */
    #[Optional]
    public ?int $requests;

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
        ?float $credits = null,
        ?string $feature = null,
        ?int $requests = null
    ): self {
        $self = new self;

        null !== $credits && $self['credits'] = $credits;
        null !== $feature && $self['feature'] = $feature;
        null !== $requests && $self['requests'] = $requests;

        return $self;
    }

    /**
     * Credits consumed by this feature.
     */
    public function withCredits(float $credits): self
    {
        $self = clone $this;
        $self['credits'] = $credits;

        return $self;
    }

    /**
     * API feature name.
     */
    public function withFeature(string $feature): self
    {
        $self = clone $this;
        $self['feature'] = $feature;

        return $self;
    }

    /**
     * Number of requests for this feature.
     */
    public function withRequests(int $requests): self
    {
        $self = clone $this;
        $self['requests'] = $requests;

        return $self;
    }
}
