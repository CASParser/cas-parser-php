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
 *   additionalInfo?: mixed,
 *   cra?: string,
 *   funds?: list<Fund>,
 *   linkedHolders?: list<LinkedHolder>,
 *   pran?: string,
 *   value?: float,
 * }
 */
final class Np implements BaseModel
{
    /** @use SdkModel<NpShape> */
    use SdkModel;

    /**
     * Additional information specific to the NPS account.
     */
    #[Api('additional_info', optional: true)]
    public mixed $additionalInfo;

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
     * @var list<LinkedHolder>|null $linkedHolders
     */
    #[Api('linked_holders', list: LinkedHolder::class, optional: true)]
    public ?array $linkedHolders;

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
     * @param list<LinkedHolder> $linkedHolders
     */
    public static function with(
        mixed $additionalInfo = null,
        ?string $cra = null,
        ?array $funds = null,
        ?array $linkedHolders = null,
        ?string $pran = null,
        ?float $value = null,
    ): self {
        $obj = new self;

        null !== $additionalInfo && $obj->additionalInfo = $additionalInfo;
        null !== $cra && $obj->cra = $cra;
        null !== $funds && $obj->funds = $funds;
        null !== $linkedHolders && $obj->linkedHolders = $linkedHolders;
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
        $obj->additionalInfo = $additionalInfo;

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
        $obj->linkedHolders = $linkedHolders;

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
