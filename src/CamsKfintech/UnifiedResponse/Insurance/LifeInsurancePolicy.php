<?php

declare(strict_types=1);

namespace CasParser\CamsKfintech\UnifiedResponse\Insurance;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type LifeInsurancePolicyShape = array{
 *   additionalInfo?: mixed,
 *   lifeAssured?: string|null,
 *   policyName?: string|null,
 *   policyNumber?: string|null,
 *   premiumAmount?: float|null,
 *   premiumFrequency?: string|null,
 *   provider?: string|null,
 *   status?: string|null,
 *   sumAssured?: float|null,
 * }
 */
final class LifeInsurancePolicy implements BaseModel
{
    /** @use SdkModel<LifeInsurancePolicyShape> */
    use SdkModel;

    /**
     * Additional information specific to the policy.
     */
    #[Optional('additional_info')]
    public mixed $additionalInfo;

    /**
     * Name of the life assured.
     */
    #[Optional('life_assured')]
    public ?string $lifeAssured;

    /**
     * Name of the insurance policy.
     */
    #[Optional('policy_name')]
    public ?string $policyName;

    /**
     * Insurance policy number.
     */
    #[Optional('policy_number')]
    public ?string $policyNumber;

    /**
     * Premium amount.
     */
    #[Optional('premium_amount')]
    public ?float $premiumAmount;

    /**
     * Frequency of premium payment (e.g., Annual, Monthly).
     */
    #[Optional('premium_frequency')]
    public ?string $premiumFrequency;

    /**
     * Insurance company name.
     */
    #[Optional]
    public ?string $provider;

    /**
     * Status of the policy (e.g., Active, Lapsed).
     */
    #[Optional]
    public ?string $status;

    /**
     * Sum assured amount.
     */
    #[Optional('sum_assured')]
    public ?float $sumAssured;

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
        mixed $additionalInfo = null,
        ?string $lifeAssured = null,
        ?string $policyName = null,
        ?string $policyNumber = null,
        ?float $premiumAmount = null,
        ?string $premiumFrequency = null,
        ?string $provider = null,
        ?string $status = null,
        ?float $sumAssured = null,
    ): self {
        $self = new self;

        null !== $additionalInfo && $self['additionalInfo'] = $additionalInfo;
        null !== $lifeAssured && $self['lifeAssured'] = $lifeAssured;
        null !== $policyName && $self['policyName'] = $policyName;
        null !== $policyNumber && $self['policyNumber'] = $policyNumber;
        null !== $premiumAmount && $self['premiumAmount'] = $premiumAmount;
        null !== $premiumFrequency && $self['premiumFrequency'] = $premiumFrequency;
        null !== $provider && $self['provider'] = $provider;
        null !== $status && $self['status'] = $status;
        null !== $sumAssured && $self['sumAssured'] = $sumAssured;

        return $self;
    }

    /**
     * Additional information specific to the policy.
     */
    public function withAdditionalInfo(mixed $additionalInfo): self
    {
        $self = clone $this;
        $self['additionalInfo'] = $additionalInfo;

        return $self;
    }

    /**
     * Name of the life assured.
     */
    public function withLifeAssured(string $lifeAssured): self
    {
        $self = clone $this;
        $self['lifeAssured'] = $lifeAssured;

        return $self;
    }

    /**
     * Name of the insurance policy.
     */
    public function withPolicyName(string $policyName): self
    {
        $self = clone $this;
        $self['policyName'] = $policyName;

        return $self;
    }

    /**
     * Insurance policy number.
     */
    public function withPolicyNumber(string $policyNumber): self
    {
        $self = clone $this;
        $self['policyNumber'] = $policyNumber;

        return $self;
    }

    /**
     * Premium amount.
     */
    public function withPremiumAmount(float $premiumAmount): self
    {
        $self = clone $this;
        $self['premiumAmount'] = $premiumAmount;

        return $self;
    }

    /**
     * Frequency of premium payment (e.g., Annual, Monthly).
     */
    public function withPremiumFrequency(string $premiumFrequency): self
    {
        $self = clone $this;
        $self['premiumFrequency'] = $premiumFrequency;

        return $self;
    }

    /**
     * Insurance company name.
     */
    public function withProvider(string $provider): self
    {
        $self = clone $this;
        $self['provider'] = $provider;

        return $self;
    }

    /**
     * Status of the policy (e.g., Active, Lapsed).
     */
    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Sum assured amount.
     */
    public function withSumAssured(float $sumAssured): self
    {
        $self = clone $this;
        $self['sumAssured'] = $sumAssured;

        return $self;
    }
}
