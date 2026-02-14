<?php

declare(strict_types=1);

namespace CasParser\Logs;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;
use CasParser\Logs\LogGetSummaryResponse\Summary;

/**
 * @phpstan-import-type SummaryShape from \CasParser\Logs\LogGetSummaryResponse\Summary
 *
 * @phpstan-type LogGetSummaryResponseShape = array{
 *   status?: string|null, summary?: null|Summary|SummaryShape
 * }
 */
final class LogGetSummaryResponse implements BaseModel
{
    /** @use SdkModel<LogGetSummaryResponseShape> */
    use SdkModel;

    #[Optional]
    public ?string $status;

    #[Optional]
    public ?Summary $summary;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Summary|SummaryShape|null $summary
     */
    public static function with(
        ?string $status = null,
        Summary|array|null $summary = null
    ): self {
        $self = new self;

        null !== $status && $self['status'] = $status;
        null !== $summary && $self['summary'] = $summary;

        return $self;
    }

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * @param Summary|SummaryShape $summary
     */
    public function withSummary(Summary|array $summary): self
    {
        $self = clone $this;
        $self['summary'] = $summary;

        return $self;
    }
}
