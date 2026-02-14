<?php

declare(strict_types=1);

namespace CasParser\Logs;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Concerns\SdkParams;
use CasParser\Core\Contracts\BaseModel;

/**
 * Get aggregated usage statistics grouped by feature.
 *
 * Useful for understanding which API features are being used most and tracking usage trends.
 *
 * @see CasParser\Services\LogsService::getSummary()
 *
 * @phpstan-type LogGetSummaryParamsShape = array{
 *   endTime?: \DateTimeInterface|null, startTime?: \DateTimeInterface|null
 * }
 */
final class LogGetSummaryParams implements BaseModel
{
    /** @use SdkModel<LogGetSummaryParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * End time filter (ISO 8601). Defaults to now.
     */
    #[Optional('end_time')]
    public ?\DateTimeInterface $endTime;

    /**
     * Start time filter (ISO 8601). Defaults to start of current month.
     */
    #[Optional('start_time')]
    public ?\DateTimeInterface $startTime;

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
        ?\DateTimeInterface $endTime = null,
        ?\DateTimeInterface $startTime = null
    ): self {
        $self = new self;

        null !== $endTime && $self['endTime'] = $endTime;
        null !== $startTime && $self['startTime'] = $startTime;

        return $self;
    }

    /**
     * End time filter (ISO 8601). Defaults to now.
     */
    public function withEndTime(\DateTimeInterface $endTime): self
    {
        $self = clone $this;
        $self['endTime'] = $endTime;

        return $self;
    }

    /**
     * Start time filter (ISO 8601). Defaults to start of current month.
     */
    public function withStartTime(\DateTimeInterface $startTime): self
    {
        $self = clone $this;
        $self['startTime'] = $startTime;

        return $self;
    }
}
