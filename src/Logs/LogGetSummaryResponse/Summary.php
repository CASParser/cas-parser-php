<?php

declare(strict_types=1);

namespace CasParser\Logs\LogGetSummaryResponse;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;
use CasParser\Logs\LogGetSummaryResponse\Summary\ByFeature;

/**
 * @phpstan-import-type ByFeatureShape from \CasParser\Logs\LogGetSummaryResponse\Summary\ByFeature
 *
 * @phpstan-type SummaryShape = array{
 *   byFeature?: list<ByFeature|ByFeatureShape>|null,
 *   totalCredits?: float|null,
 *   totalRequests?: int|null,
 * }
 */
final class Summary implements BaseModel
{
    /** @use SdkModel<SummaryShape> */
    use SdkModel;

    /**
     * Usage breakdown by feature.
     *
     * @var list<ByFeature>|null $byFeature
     */
    #[Optional('by_feature', list: ByFeature::class)]
    public ?array $byFeature;

    /**
     * Total credits consumed in the period.
     */
    #[Optional('total_credits')]
    public ?float $totalCredits;

    /**
     * Total API requests made in the period.
     */
    #[Optional('total_requests')]
    public ?int $totalRequests;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<ByFeature|ByFeatureShape>|null $byFeature
     */
    public static function with(
        ?array $byFeature = null,
        ?float $totalCredits = null,
        ?int $totalRequests = null,
    ): self {
        $self = new self;

        null !== $byFeature && $self['byFeature'] = $byFeature;
        null !== $totalCredits && $self['totalCredits'] = $totalCredits;
        null !== $totalRequests && $self['totalRequests'] = $totalRequests;

        return $self;
    }

    /**
     * Usage breakdown by feature.
     *
     * @param list<ByFeature|ByFeatureShape> $byFeature
     */
    public function withByFeature(array $byFeature): self
    {
        $self = clone $this;
        $self['byFeature'] = $byFeature;

        return $self;
    }

    /**
     * Total credits consumed in the period.
     */
    public function withTotalCredits(float $totalCredits): self
    {
        $self = clone $this;
        $self['totalCredits'] = $totalCredits;

        return $self;
    }

    /**
     * Total API requests made in the period.
     */
    public function withTotalRequests(int $totalRequests): self
    {
        $self = clone $this;
        $self['totalRequests'] = $totalRequests;

        return $self;
    }
}
