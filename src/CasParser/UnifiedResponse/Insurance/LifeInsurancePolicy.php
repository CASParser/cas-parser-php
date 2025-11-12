<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse\Insurance;

use CasParser\Core\Attributes\Api;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type LifeInsurancePolicyShape = array{
 *   additional_info?: mixed,
 *   life_assured?: string|null,
 *   policy_name?: string|null,
 *   policy_number?: string|null,
 *   premium_amount?: float|null,
 *   premium_frequency?: string|null,
 *   provider?: string|null,
 *   status?: string|null,
 *   sum_assured?: float|null,
 * }
 */
final class LifeInsurancePolicy implements BaseModel
{
    /** @use SdkModel<LifeInsurancePolicyShape> */
    use SdkModel;

    /**
     * Additional information specific to the policy.
     */
    #[Api(optional: true)]
    public mixed $additional_info;

    /**
     * Name of the life assured.
     */
    #[Api(optional: true)]
    public ?string $life_assured;

    /**
     * Name of the insurance policy.
     */
    #[Api(optional: true)]
    public ?string $policy_name;

    /**
     * Insurance policy number.
     */
    #[Api(optional: true)]
    public ?string $policy_number;

    /**
     * Premium amount.
     */
    #[Api(optional: true)]
    public ?float $premium_amount;

    /**
     * Frequency of premium payment (e.g., Annual, Monthly).
     */
    #[Api(optional: true)]
    public ?string $premium_frequency;

    /**
     * Insurance company name.
     */
    #[Api(optional: true)]
    public ?string $provider;

    /**
     * Status of the policy (e.g., Active, Lapsed).
     */
    #[Api(optional: true)]
    public ?string $status;

    /**
     * Sum assured amount.
     */
    #[Api(optional: true)]
    public ?float $sum_assured;

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
        ?string $life_assured = null,
        ?string $policy_name = null,
        ?string $policy_number = null,
        ?float $premium_amount = null,
        ?string $premium_frequency = null,
        ?string $provider = null,
        ?string $status = null,
        ?float $sum_assured = null,
    ): self {
        $obj = new self;

        null !== $additional_info && $obj->additional_info = $additional_info;
        null !== $life_assured && $obj->life_assured = $life_assured;
        null !== $policy_name && $obj->policy_name = $policy_name;
        null !== $policy_number && $obj->policy_number = $policy_number;
        null !== $premium_amount && $obj->premium_amount = $premium_amount;
        null !== $premium_frequency && $obj->premium_frequency = $premium_frequency;
        null !== $provider && $obj->provider = $provider;
        null !== $status && $obj->status = $status;
        null !== $sum_assured && $obj->sum_assured = $sum_assured;

        return $obj;
    }

    /**
     * Additional information specific to the policy.
     */
    public function withAdditionalInfo(mixed $additionalInfo): self
    {
        $obj = clone $this;
        $obj->additional_info = $additionalInfo;

        return $obj;
    }

    /**
     * Name of the life assured.
     */
    public function withLifeAssured(string $lifeAssured): self
    {
        $obj = clone $this;
        $obj->life_assured = $lifeAssured;

        return $obj;
    }

    /**
     * Name of the insurance policy.
     */
    public function withPolicyName(string $policyName): self
    {
        $obj = clone $this;
        $obj->policy_name = $policyName;

        return $obj;
    }

    /**
     * Insurance policy number.
     */
    public function withPolicyNumber(string $policyNumber): self
    {
        $obj = clone $this;
        $obj->policy_number = $policyNumber;

        return $obj;
    }

    /**
     * Premium amount.
     */
    public function withPremiumAmount(float $premiumAmount): self
    {
        $obj = clone $this;
        $obj->premium_amount = $premiumAmount;

        return $obj;
    }

    /**
     * Frequency of premium payment (e.g., Annual, Monthly).
     */
    public function withPremiumFrequency(string $premiumFrequency): self
    {
        $obj = clone $this;
        $obj->premium_frequency = $premiumFrequency;

        return $obj;
    }

    /**
     * Insurance company name.
     */
    public function withProvider(string $provider): self
    {
        $obj = clone $this;
        $obj->provider = $provider;

        return $obj;
    }

    /**
     * Status of the policy (e.g., Active, Lapsed).
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }

    /**
     * Sum assured amount.
     */
    public function withSumAssured(float $sumAssured): self
    {
        $obj = clone $this;
        $obj->sum_assured = $sumAssured;

        return $obj;
    }
}
