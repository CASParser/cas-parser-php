<?php

declare(strict_types=1);

namespace CasParser\CamsKfintech\UnifiedResponse\Meta;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type StatementPeriodShape = array{from?: string|null, to?: string|null}
 */
final class StatementPeriod implements BaseModel
{
    /** @use SdkModel<StatementPeriodShape> */
    use SdkModel;

    /**
     * Start date of the statement period.
     */
    #[Optional]
    public ?string $from;

    /**
     * End date of the statement period.
     */
    #[Optional]
    public ?string $to;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $from = null, ?string $to = null): self
    {
        $self = new self;

        null !== $from && $self['from'] = $from;
        null !== $to && $self['to'] = $to;

        return $self;
    }

    /**
     * Start date of the statement period.
     */
    public function withFrom(string $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * End date of the statement period.
     */
    public function withTo(string $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }
}
