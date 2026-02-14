<?php

declare(strict_types=1);

namespace CasParser\Credits;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type CreditCheckResponseShape = array{
 *   enabledFeatures?: list<string>|null,
 *   isUnlimited?: bool|null,
 *   limit?: int|null,
 *   remaining?: float|null,
 *   resetsAt?: \DateTimeInterface|null,
 *   used?: float|null,
 * }
 */
final class CreditCheckResponse implements BaseModel
{
    /** @use SdkModel<CreditCheckResponseShape> */
    use SdkModel;

    /**
     * List of API features enabled for your plan.
     *
     * @var list<string>|null $enabledFeatures
     */
    #[Optional('enabled_features', list: 'string')]
    public ?array $enabledFeatures;

    /**
     * Whether the account has unlimited credits.
     */
    #[Optional('is_unlimited')]
    public ?bool $isUnlimited;

    /**
     * Total credit limit for billing period.
     */
    #[Optional]
    public ?int $limit;

    /**
     * Remaining credits (null if unlimited).
     */
    #[Optional(nullable: true)]
    public ?float $remaining;

    /**
     * When credits reset (ISO 8601).
     */
    #[Optional('resets_at', nullable: true)]
    public ?\DateTimeInterface $resetsAt;

    /**
     * Number of credits used this billing period.
     */
    #[Optional]
    public ?float $used;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $enabledFeatures
     */
    public static function with(
        ?array $enabledFeatures = null,
        ?bool $isUnlimited = null,
        ?int $limit = null,
        ?float $remaining = null,
        ?\DateTimeInterface $resetsAt = null,
        ?float $used = null,
    ): self {
        $self = new self;

        null !== $enabledFeatures && $self['enabledFeatures'] = $enabledFeatures;
        null !== $isUnlimited && $self['isUnlimited'] = $isUnlimited;
        null !== $limit && $self['limit'] = $limit;
        null !== $remaining && $self['remaining'] = $remaining;
        null !== $resetsAt && $self['resetsAt'] = $resetsAt;
        null !== $used && $self['used'] = $used;

        return $self;
    }

    /**
     * List of API features enabled for your plan.
     *
     * @param list<string> $enabledFeatures
     */
    public function withEnabledFeatures(array $enabledFeatures): self
    {
        $self = clone $this;
        $self['enabledFeatures'] = $enabledFeatures;

        return $self;
    }

    /**
     * Whether the account has unlimited credits.
     */
    public function withIsUnlimited(bool $isUnlimited): self
    {
        $self = clone $this;
        $self['isUnlimited'] = $isUnlimited;

        return $self;
    }

    /**
     * Total credit limit for billing period.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Remaining credits (null if unlimited).
     */
    public function withRemaining(?float $remaining): self
    {
        $self = clone $this;
        $self['remaining'] = $remaining;

        return $self;
    }

    /**
     * When credits reset (ISO 8601).
     */
    public function withResetsAt(?\DateTimeInterface $resetsAt): self
    {
        $self = clone $this;
        $self['resetsAt'] = $resetsAt;

        return $self;
    }

    /**
     * Number of credits used this billing period.
     */
    public function withUsed(float $used): self
    {
        $self = clone $this;
        $self['used'] = $used;

        return $self;
    }
}
