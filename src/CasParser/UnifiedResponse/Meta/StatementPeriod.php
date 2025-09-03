<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse\Meta;

use CasParser\Core\Attributes\Api;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type statement_period = array{
 *   from?: \DateTimeInterface|null, to?: \DateTimeInterface|null
 * }
 */
final class StatementPeriod implements BaseModel
{
    /** @use SdkModel<statement_period> */
    use SdkModel;

    /**
     * Start date of the statement period.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $from;

    /**
     * End date of the statement period.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $to;

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
        ?\DateTimeInterface $from = null,
        ?\DateTimeInterface $to = null
    ): self {
        $obj = new self;

        null !== $from && $obj->from = $from;
        null !== $to && $obj->to = $to;

        return $obj;
    }

    /**
     * Start date of the statement period.
     */
    public function withFrom(\DateTimeInterface $from): self
    {
        $obj = clone $this;
        $obj->from = $from;

        return $obj;
    }

    /**
     * End date of the statement period.
     */
    public function withTo(\DateTimeInterface $to): self
    {
        $obj = clone $this;
        $obj->to = $to;

        return $obj;
    }
}
