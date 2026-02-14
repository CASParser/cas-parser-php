<?php

declare(strict_types=1);

namespace CasParser\CamsKfintech\UnifiedResponse\Np\Fund;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * Additional information specific to the NPS fund.
 *
 * @phpstan-type AdditionalInfoShape = array{
 *   manager?: string|null, tier?: float|null
 * }
 */
final class AdditionalInfo implements BaseModel
{
    /** @use SdkModel<AdditionalInfoShape> */
    use SdkModel;

    /**
     * Fund manager name.
     */
    #[Optional]
    public ?string $manager;

    /**
     * NPS tier (Tier I or Tier II).
     */
    #[Optional(nullable: true)]
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
        $self = new self;

        null !== $manager && $self['manager'] = $manager;
        null !== $tier && $self['tier'] = $tier;

        return $self;
    }

    /**
     * Fund manager name.
     */
    public function withManager(string $manager): self
    {
        $self = clone $this;
        $self['manager'] = $manager;

        return $self;
    }

    /**
     * NPS tier (Tier I or Tier II).
     */
    public function withTier(?float $tier): self
    {
        $self = clone $this;
        $self['tier'] = $tier;

        return $self;
    }
}
