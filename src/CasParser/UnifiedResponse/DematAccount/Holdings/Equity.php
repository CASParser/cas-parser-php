<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse\DematAccount\Holdings;

use CasParser\Core\Attributes\Api;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type equity_alias = array{
 *   additionalInfo?: mixed,
 *   isin?: string|null,
 *   name?: string|null,
 *   units?: float|null,
 *   value?: float|null,
 * }
 */
final class Equity implements BaseModel
{
    /** @use SdkModel<equity_alias> */
    use SdkModel;

    /**
     * Additional information specific to the equity.
     */
    #[Api('additional_info', optional: true)]
    public mixed $additionalInfo;

    /**
     * ISIN code of the equity.
     */
    #[Api(optional: true)]
    public ?string $isin;

    /**
     * Name of the equity.
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
        self::introspect();
        $this->unsetOptionalProperties();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        mixed $additionalInfo = null,
        ?string $isin = null,
        ?string $name = null,
        ?float $units = null,
        ?float $value = null,
    ): self {
        $obj = new self;

        null !== $additionalInfo && $obj->additionalInfo = $additionalInfo;
        null !== $isin && $obj->isin = $isin;
        null !== $name && $obj->name = $name;
        null !== $units && $obj->units = $units;
        null !== $value && $obj->value = $value;

        return $obj;
    }

    /**
     * Additional information specific to the equity.
     */
    public function withAdditionalInfo(mixed $additionalInfo): self
    {
        $obj = clone $this;
        $obj->additionalInfo = $additionalInfo;

        return $obj;
    }

    /**
     * ISIN code of the equity.
     */
    public function withIsin(string $isin): self
    {
        $obj = clone $this;
        $obj->isin = $isin;

        return $obj;
    }

    /**
     * Name of the equity.
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
