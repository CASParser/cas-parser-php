<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse;

use CasParser\CasParser\UnifiedResponse\Np\Fund;
use CasParser\CasParser\UnifiedResponse\Np\LinkedHolder;
use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type FundShape from \CasParser\CasParser\UnifiedResponse\Np\Fund
 * @phpstan-import-type LinkedHolderShape from \CasParser\CasParser\UnifiedResponse\Np\LinkedHolder
 *
 * @phpstan-type NpShape = array{
 *   additionalInfo?: mixed,
 *   cra?: string|null,
 *   funds?: list<FundShape>|null,
 *   linkedHolders?: list<LinkedHolderShape>|null,
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
    #[Optional('additional_info')]
    public mixed $additionalInfo;

    /**
     * Central Record Keeping Agency name.
     */
    #[Optional]
    public ?string $cra;

    /** @var list<Fund>|null $funds */
    #[Optional(list: Fund::class)]
    public ?array $funds;

    /**
     * List of account holders linked to this NPS account.
     *
     * @var list<LinkedHolder>|null $linkedHolders
     */
    #[Optional('linked_holders', list: LinkedHolder::class)]
    public ?array $linkedHolders;

    /**
     * Permanent Retirement Account Number (PRAN).
     */
    #[Optional]
    public ?string $pran;

    /**
     * Total value of the NPS account.
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
     * @param list<FundShape>|null $funds
     * @param list<LinkedHolderShape>|null $linkedHolders
     */
    public static function with(
        mixed $additionalInfo = null,
        ?string $cra = null,
        ?array $funds = null,
        ?array $linkedHolders = null,
        ?string $pran = null,
        ?float $value = null,
    ): self {
        $self = new self;

        null !== $additionalInfo && $self['additionalInfo'] = $additionalInfo;
        null !== $cra && $self['cra'] = $cra;
        null !== $funds && $self['funds'] = $funds;
        null !== $linkedHolders && $self['linkedHolders'] = $linkedHolders;
        null !== $pran && $self['pran'] = $pran;
        null !== $value && $self['value'] = $value;

        return $self;
    }

    /**
     * Additional information specific to the NPS account.
     */
    public function withAdditionalInfo(mixed $additionalInfo): self
    {
        $self = clone $this;
        $self['additionalInfo'] = $additionalInfo;

        return $self;
    }

    /**
     * Central Record Keeping Agency name.
     */
    public function withCra(string $cra): self
    {
        $self = clone $this;
        $self['cra'] = $cra;

        return $self;
    }

    /**
     * @param list<FundShape> $funds
     */
    public function withFunds(array $funds): self
    {
        $self = clone $this;
        $self['funds'] = $funds;

        return $self;
    }

    /**
     * List of account holders linked to this NPS account.
     *
     * @param list<LinkedHolderShape> $linkedHolders
     */
    public function withLinkedHolders(array $linkedHolders): self
    {
        $self = clone $this;
        $self['linkedHolders'] = $linkedHolders;

        return $self;
    }

    /**
     * Permanent Retirement Account Number (PRAN).
     */
    public function withPran(string $pran): self
    {
        $self = clone $this;
        $self['pran'] = $pran;

        return $self;
    }

    /**
     * Total value of the NPS account.
     */
    public function withValue(float $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
