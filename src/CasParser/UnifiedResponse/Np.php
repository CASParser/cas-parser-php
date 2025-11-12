<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse;

use CasParser\CasParser\UnifiedResponse\Np\Fund;
use CasParser\CasParser\UnifiedResponse\Np\LinkedHolder;
use CasParser\Core\Attributes\Api;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type NpShape = array{
 *   additional_info?: mixed,
 *   cra?: string|null,
 *   funds?: list<Fund>|null,
 *   linked_holders?: list<LinkedHolder>|null,
 *   pran?: string|null,
 *   value?: float|null,
 * }
 */
final class Np implements BaseModel
{
    /** @use SdkModel<NpShape> */
    use SdkModel;

    /**
     * Additional information specific to the NPS account.
     */
    #[Api(optional: true)]
    public mixed $additional_info;

    /**
     * Central Record Keeping Agency name.
     */
    #[Api(optional: true)]
    public ?string $cra;

    /** @var list<Fund>|null $funds */
    #[Api(list: Fund::class, optional: true)]
    public ?array $funds;

    /**
     * List of account holders linked to this NPS account.
     *
     * @var list<LinkedHolder>|null $linked_holders
     */
    #[Api(list: LinkedHolder::class, optional: true)]
    public ?array $linked_holders;

    /**
     * Permanent Retirement Account Number (PRAN).
     */
    #[Api(optional: true)]
    public ?string $pran;

    /**
     * Total value of the NPS account.
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
     *
     * @param list<Fund> $funds
     * @param list<LinkedHolder> $linked_holders
     */
    public static function with(
        mixed $additional_info = null,
        ?string $cra = null,
        ?array $funds = null,
        ?array $linked_holders = null,
        ?string $pran = null,
        ?float $value = null,
    ): self {
        $obj = new self;

        null !== $additional_info && $obj->additional_info = $additional_info;
        null !== $cra && $obj->cra = $cra;
        null !== $funds && $obj->funds = $funds;
        null !== $linked_holders && $obj->linked_holders = $linked_holders;
        null !== $pran && $obj->pran = $pran;
        null !== $value && $obj->value = $value;

        return $obj;
    }

    /**
     * Additional information specific to the NPS account.
     */
    public function withAdditionalInfo(mixed $additionalInfo): self
    {
        $obj = clone $this;
        $obj->additional_info = $additionalInfo;

        return $obj;
    }

    /**
     * Central Record Keeping Agency name.
     */
    public function withCra(string $cra): self
    {
        $obj = clone $this;
        $obj->cra = $cra;

        return $obj;
    }

    /**
     * @param list<Fund> $funds
     */
    public function withFunds(array $funds): self
    {
        $obj = clone $this;
        $obj->funds = $funds;

        return $obj;
    }

    /**
     * List of account holders linked to this NPS account.
     *
     * @param list<LinkedHolder> $linkedHolders
     */
    public function withLinkedHolders(array $linkedHolders): self
    {
        $obj = clone $this;
        $obj->linked_holders = $linkedHolders;

        return $obj;
    }

    /**
     * Permanent Retirement Account Number (PRAN).
     */
    public function withPran(string $pran): self
    {
        $obj = clone $this;
        $obj->pran = $pran;

        return $obj;
    }

    /**
     * Total value of the NPS account.
     */
    public function withValue(float $value): self
    {
        $obj = clone $this;
        $obj->value = $value;

        return $obj;
    }
}
