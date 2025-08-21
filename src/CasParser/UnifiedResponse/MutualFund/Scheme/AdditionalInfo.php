<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse\MutualFund\Scheme;

use CasParser\Core\Attributes\Api;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * Additional information specific to the scheme.
 *
 * @phpstan-type additional_info_alias = array{
 *   advisor?: string,
 *   amfi?: string,
 *   closeUnits?: float,
 *   openUnits?: float,
 *   rtaCode?: string,
 * }
 */
final class AdditionalInfo implements BaseModel
{
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
    #[Api('close_units', optional: true)]
    public ?float $closeUnits;

    /**
     * Opening balance units (CAMS/KFintech).
     */
    #[Api('open_units', optional: true)]
    public ?float $openUnits;

    /**
     * RTA code for the scheme (CAMS/KFintech).
     */
    #[Api('rta_code', optional: true)]
    public ?string $rtaCode;

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
        ?string $advisor = null,
        ?string $amfi = null,
        ?float $closeUnits = null,
        ?float $openUnits = null,
        ?string $rtaCode = null,
    ): self {
        $obj = new self;

        null !== $advisor && $obj->advisor = $advisor;
        null !== $amfi && $obj->amfi = $amfi;
        null !== $closeUnits && $obj->closeUnits = $closeUnits;
        null !== $openUnits && $obj->openUnits = $openUnits;
        null !== $rtaCode && $obj->rtaCode = $rtaCode;

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
        $obj->closeUnits = $closeUnits;

        return $obj;
    }

    /**
     * Opening balance units (CAMS/KFintech).
     */
    public function withOpenUnits(float $openUnits): self
    {
        $obj = clone $this;
        $obj->openUnits = $openUnits;

        return $obj;
    }

    /**
     * RTA code for the scheme (CAMS/KFintech).
     */
    public function withRtaCode(string $rtaCode): self
    {
        $obj = clone $this;
        $obj->rtaCode = $rtaCode;

        return $obj;
    }
}
