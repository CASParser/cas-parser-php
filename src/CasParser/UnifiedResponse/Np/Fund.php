<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse\Np;

use CasParser\CasParser\UnifiedResponse\Np\Fund\AdditionalInfo;
use CasParser\Core\Attributes\Api;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type fund_alias = array{
 *   additionalInfo?: AdditionalInfo,
 *   cost?: float,
 *   name?: string,
 *   nav?: float,
 *   units?: float,
 *   value?: float,
 * }
 */
final class Fund implements BaseModel
{
    /** @use SdkModel<fund_alias> */
    use SdkModel;

    /**
     * Additional information specific to the NPS fund.
     */
    #[Api('additional_info', optional: true)]
    public ?AdditionalInfo $additionalInfo;

    /**
     * Cost of investment.
     */
    #[Api(optional: true)]
    public ?float $cost;

    /**
     * Name of the NPS fund.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * Net Asset Value per unit.
     */
    #[Api(optional: true)]
    public ?float $nav;

    /**
     * Number of units held.
     */
    #[Api(optional: true)]
    public ?float $units;

    /**
     * Current market value of the holding.
     */
    #[Api(optional: true)]
    public ?float $value;

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
        ?AdditionalInfo $additionalInfo = null,
        ?float $cost = null,
        ?string $name = null,
        ?float $nav = null,
        ?float $units = null,
        ?float $value = null,
    ): self {
        $obj = new self;

        null !== $additionalInfo && $obj->additionalInfo = $additionalInfo;
        null !== $cost && $obj->cost = $cost;
        null !== $name && $obj->name = $name;
        null !== $nav && $obj->nav = $nav;
        null !== $units && $obj->units = $units;
        null !== $value && $obj->value = $value;

        return $obj;
    }

    /**
     * Additional information specific to the NPS fund.
     */
    public function withAdditionalInfo(AdditionalInfo $additionalInfo): self
    {
        $obj = clone $this;
        $obj->additionalInfo = $additionalInfo;

        return $obj;
    }

    /**
     * Cost of investment.
     */
    public function withCost(float $cost): self
    {
        $obj = clone $this;
        $obj->cost = $cost;

        return $obj;
    }

    /**
     * Name of the NPS fund.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Net Asset Value per unit.
     */
    public function withNav(float $nav): self
    {
        $obj = clone $this;
        $obj->nav = $nav;

        return $obj;
    }

    /**
     * Number of units held.
     */
    public function withUnits(float $units): self
    {
        $obj = clone $this;
        $obj->units = $units;

        return $obj;
    }

    /**
     * Current market value of the holding.
     */
    public function withValue(float $value): self
    {
        $obj = clone $this;
        $obj->value = $value;

        return $obj;
    }
}
