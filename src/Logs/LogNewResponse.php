<?php

declare(strict_types=1);

namespace CasParser\Logs;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;
use CasParser\Logs\LogNewResponse\Log;

/**
 * @phpstan-import-type LogShape from \CasParser\Logs\LogNewResponse\Log
 *
 * @phpstan-type LogNewResponseShape = array{
 *   count?: int|null, logs?: list<Log|LogShape>|null, status?: string|null
 * }
 */
final class LogNewResponse implements BaseModel
{
    /** @use SdkModel<LogNewResponseShape> */
    use SdkModel;

    /**
     * Number of logs returned.
     */
    #[Optional]
    public ?int $count;

    /** @var list<Log>|null $logs */
    #[Optional(list: Log::class)]
    public ?array $logs;

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
     * @param list<Log|LogShape>|null $logs
     */
    public static function with(
        ?int $count = null,
        ?array $logs = null,
        ?string $status = null
    ): self {
        $self = new self;

        null !== $count && $self['count'] = $count;
        null !== $logs && $self['logs'] = $logs;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    /**
     * Number of logs returned.
     */
    public function withCount(int $count): self
    {
        $self = clone $this;
        $self['count'] = $count;

        return $self;
    }

    /**
     * @param list<Log|LogShape> $logs
     */
    public function withLogs(array $logs): self
    {
        $self = clone $this;
        $self['logs'] = $logs;

        return $self;
    }

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
