<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse\MutualFund\Scheme;

use CasParser\Core\Attributes\Api;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type gain_alias = array{absolute?: float|null, percentage?: float|null}
 */
final class Gain implements BaseModel
{
    /** @use SdkModel<gain_alias> */
    use SdkModel;

    /**
     * Absolute gain or loss.
     */
    #[Api(optional: true)]
    public ?float $absolute;

    /**
     * Percentage gain or loss.
     */
    #[Api(optional: true)]
    public ?float $percentage;

    public function __construct()
    {
        self::introspect();
        $this->unsetOptionalProperties();
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
        $obj = new self;

        null !== $absolute && $obj->absolute = $absolute;
        null !== $percentage && $obj->percentage = $percentage;

        return $obj;
    }

    /**
     * Absolute gain or loss.
     */
    public function withAbsolute(float $absolute): self
    {
        $obj = clone $this;
        $obj->absolute = $absolute;

        return $obj;
    }

    /**
     * Percentage gain or loss.
     */
    public function withPercentage(float $percentage): self
    {
        $obj = clone $this;
        $obj->percentage = $percentage;

        return $obj;
    }
}
