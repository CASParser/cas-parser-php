<?php

declare(strict_types=1);

namespace CasParser\CamsKfintech\UnifiedResponse\Np;

use CasParser\CamsKfintech\UnifiedResponse\Np\Fund\AdditionalInfo;
use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AdditionalInfoShape from \CasParser\CamsKfintech\UnifiedResponse\Np\Fund\AdditionalInfo
 *
 * @phpstan-type FundShape = array{
 *   additionalInfo?: null|AdditionalInfo|AdditionalInfoShape,
 *   cost?: float|null,
 *   name?: string|null,
 *   nav?: float|null,
 *   units?: float|null,
 *   value?: float|null,
 * }
 */
final class Fund implements BaseModel
{
    /** @use SdkModel<FundShape> */
    use SdkModel;

    /**
     * Additional information specific to the NPS fund.
     */
    #[Optional('additional_info')]
    public ?AdditionalInfo $additionalInfo;

    /**
     * Cost of investment.
     */
    #[Optional]
    public ?float $cost;

    /**
     * Name of the NPS fund.
     */
    #[Optional]
    public ?string $name;

    /**
     * Net Asset Value per unit.
     */
    #[Optional]
    public ?float $nav;

    /**
     * Number of units held.
     */
    #[Optional]
    public ?float $units;

    /**
     * Current market value of the holding.
     */
    #[Optional]
    public ?float $value;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param AdditionalInfo|AdditionalInfoShape|null $additionalInfo
     */
    public static function with(
        AdditionalInfo|array|null $additionalInfo = null,
        ?float $cost = null,
        ?string $name = null,
        ?float $nav = null,
        ?float $units = null,
        ?float $value = null,
    ): self {
        $self = new self;

        null !== $additionalInfo && $self['additionalInfo'] = $additionalInfo;
        null !== $cost && $self['cost'] = $cost;
        null !== $name && $self['name'] = $name;
        null !== $nav && $self['nav'] = $nav;
        null !== $units && $self['units'] = $units;
        null !== $value && $self['value'] = $value;

        return $self;
    }

    /**
     * Additional information specific to the NPS fund.
     *
     * @param AdditionalInfo|AdditionalInfoShape $additionalInfo
     */
    public function withAdditionalInfo(
        AdditionalInfo|array $additionalInfo
    ): self {
        $self = clone $this;
        $self['additionalInfo'] = $additionalInfo;

        return $self;
    }

    /**
     * Cost of investment.
     */
    public function withCost(float $cost): self
    {
        $self = clone $this;
        $self['cost'] = $cost;

        return $self;
    }

    /**
     * Name of the NPS fund.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Net Asset Value per unit.
     */
    public function withNav(float $nav): self
    {
        $self = clone $this;
        $self['nav'] = $nav;

        return $self;
    }

    /**
     * Number of units held.
     */
    public function withUnits(float $units): self
    {
        $self = clone $this;
        $self['units'] = $units;

        return $self;
    }

    /**
     * Current market value of the holding.
     */
    public function withValue(float $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
