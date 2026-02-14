<?php

declare(strict_types=1);

namespace CasParser\Logs;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Concerns\SdkParams;
use CasParser\Core\Contracts\BaseModel;

/**
 * Retrieve detailed API usage logs for your account.
 *
 * Returns a list of API calls with timestamps, features used, status codes, and credits consumed.
 * Useful for monitoring usage patterns and debugging.
 *
 * @see CasParser\Services\LogsService::create()
 *
 * @phpstan-type LogCreateParamsShape = array{
 *   endTime?: \DateTimeInterface|null,
 *   limit?: int|null,
 *   startTime?: \DateTimeInterface|null,
 * }
 */
final class LogCreateParams implements BaseModel
{
    /** @use SdkModel<LogCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * End time filter (ISO 8601). Defaults to now.
     */
    #[Optional('end_time')]
    public ?\DateTimeInterface $endTime;

    /**
     * Maximum number of logs to return.
     */
    #[Optional]
    public ?int $limit;

    /**
     * Start time filter (ISO 8601). Defaults to 30 days ago.
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
        ?int $limit = null,
        ?\DateTimeInterface $startTime = null,
    ): self {
        $self = new self;

        null !== $endTime && $self['endTime'] = $endTime;
        null !== $limit && $self['limit'] = $limit;
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
     * Maximum number of logs to return.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Start time filter (ISO 8601). Defaults to 30 days ago.
     */
    public function withStartTime(\DateTimeInterface $startTime): self
    {
        $self = clone $this;
        $self['startTime'] = $startTime;

        return $self;
    }
}
