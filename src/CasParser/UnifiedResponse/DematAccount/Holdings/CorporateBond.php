<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse\DematAccount\Holdings;

use CasParser\Core\Attributes\Api;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type CorporateBondShape = array{
 *   additional_info?: mixed,
 *   isin?: string|null,
 *   name?: string|null,
 *   units?: float|null,
 *   value?: float|null,
 * }
 */
final class CorporateBond implements BaseModel
{
    /** @use SdkModel<CorporateBondShape> */
    use SdkModel;

    /**
     * Additional information specific to the corporate bond.
     */
    #[Api(optional: true)]
    public mixed $additional_info;

    /**
     * ISIN code of the corporate bond.
     */
    #[Api(optional: true)]
    public ?string $isin;

    /**
     * Name of the corporate bond.
     */
    #[Api(optional: true)]
    public ?string $name;

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
        mixed $additional_info = null,
        ?string $isin = null,
        ?string $name = null,
        ?float $units = null,
        ?float $value = null,
    ): self {
        $obj = new self;

        null !== $additional_info && $obj->additional_info = $additional_info;
        null !== $isin && $obj->isin = $isin;
        null !== $name && $obj->name = $name;
        null !== $units && $obj->units = $units;
        null !== $value && $obj->value = $value;

        return $obj;
    }

    /**
     * Additional information specific to the corporate bond.
     */
    public function withAdditionalInfo(mixed $additionalInfo): self
    {
        $obj = clone $this;
        $obj->additional_info = $additionalInfo;

        return $obj;
    }

    /**
     * ISIN code of the corporate bond.
     */
    public function withIsin(string $isin): self
    {
        $obj = clone $this;
        $obj->isin = $isin;

        return $obj;
    }

    /**
     * Name of the corporate bond.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

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
