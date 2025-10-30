<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse\Np\Fund;

use CasParser\Core\Attributes\Api;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * Additional information specific to the NPS fund.
 *
 * @phpstan-type AdditionalInfoShape = array{manager?: string, tier?: float|null}
 */
final class AdditionalInfo implements BaseModel
{
    /** @use SdkModel<AdditionalInfoShape> */
    use SdkModel;

    /**
     * Fund manager name.
     */
    #[Api(optional: true)]
    public ?string $manager;

    /**
     * NPS tier (Tier I or Tier II).
     */
    #[Api(nullable: true, optional: true)]
    public ?float $tier;

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
        ?string $manager = null,
        ?float $tier = null
    ): self {
        $obj = new self;

        null !== $manager && $obj->manager = $manager;
        null !== $tier && $obj->tier = $tier;

        return $obj;
    }

    /**
     * Fund manager name.
     */
    public function withManager(string $manager): self
    {
        $obj = clone $this;
        $obj->manager = $manager;

        return $obj;
    }

    /**
     * NPS tier (Tier I or Tier II).
     */
    public function withTier(?float $tier): self
    {
        $obj = clone $this;
        $obj->tier = $tier;

        return $obj;
    }
}
