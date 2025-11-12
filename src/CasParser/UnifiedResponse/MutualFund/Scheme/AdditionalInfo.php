<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse\MutualFund\Scheme;

use CasParser\Core\Attributes\Api;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * Additional information specific to the scheme.
 *
 * @phpstan-type AdditionalInfoShape = array{
 *   advisor?: string|null,
 *   amfi?: string|null,
 *   close_units?: float|null,
 *   open_units?: float|null,
 *   rta_code?: string|null,
 * }
 */
final class AdditionalInfo implements BaseModel
{
    /** @use SdkModel<AdditionalInfoShape> */
    use SdkModel;

    /**
     * Financial advisor name (CAMS/KFintech).
     */
    #[Api(optional: true)]
    public ?string $advisor;

    /**
     * AMFI code for the scheme (CAMS/KFintech).
     */
    #[Api(optional: true)]
    public ?string $amfi;

    /**
     * Closing balance units (CAMS/KFintech).
     */
    #[Api(optional: true)]
    public ?float $close_units;

    /**
     * Opening balance units (CAMS/KFintech).
     */
    #[Api(optional: true)]
    public ?float $open_units;

    /**
     * RTA code for the scheme (CAMS/KFintech).
     */
    #[Api(optional: true)]
    public ?string $rta_code;

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
        ?string $advisor = null,
        ?string $amfi = null,
        ?float $close_units = null,
        ?float $open_units = null,
        ?string $rta_code = null,
    ): self {
        $obj = new self;

        null !== $advisor && $obj->advisor = $advisor;
        null !== $amfi && $obj->amfi = $amfi;
        null !== $close_units && $obj->close_units = $close_units;
        null !== $open_units && $obj->open_units = $open_units;
        null !== $rta_code && $obj->rta_code = $rta_code;

        return $obj;
    }

    /**
     * Financial advisor name (CAMS/KFintech).
     */
    public function withAdvisor(string $advisor): self
    {
        $obj = clone $this;
        $obj->advisor = $advisor;

        return $obj;
    }

    /**
     * AMFI code for the scheme (CAMS/KFintech).
     */
    public function withAmfi(string $amfi): self
    {
        $obj = clone $this;
        $obj->amfi = $amfi;

        return $obj;
    }

    /**
     * Closing balance units (CAMS/KFintech).
     */
    public function withCloseUnits(float $closeUnits): self
    {
        $obj = clone $this;
        $obj->close_units = $closeUnits;

        return $obj;
    }

    /**
     * Opening balance units (CAMS/KFintech).
     */
    public function withOpenUnits(float $openUnits): self
    {
        $obj = clone $this;
        $obj->open_units = $openUnits;

        return $obj;
    }

    /**
     * RTA code for the scheme (CAMS/KFintech).
     */
    public function withRtaCode(string $rtaCode): self
    {
        $obj = clone $this;
        $obj->rta_code = $rtaCode;

        return $obj;
    }
}
