<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse\Insurance;

use CasParser\Core\Attributes\Api;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type life_insurance_policy = array{
 *   additionalInfo?: mixed,
 *   lifeAssured?: string,
 *   policyName?: string,
 *   policyNumber?: string,
 *   premiumAmount?: float,
 *   premiumFrequency?: string,
 *   provider?: string,
 *   status?: string,
 *   sumAssured?: float,
 * }
 */
final class LifeInsurancePolicy implements BaseModel
{
    /** @use SdkModel<life_insurance_policy> */
    use SdkModel;

    /**
     * Additional information specific to the policy.
     */
    #[Api('additional_info', optional: true)]
    public mixed $additionalInfo;

    /**
     * Name of the life assured.
     */
    #[Api('life_assured', optional: true)]
    public ?string $lifeAssured;

    /**
     * Name of the insurance policy.
     */
    #[Api('policy_name', optional: true)]
    public ?string $policyName;

    /**
     * Insurance policy number.
     */
    #[Api('policy_number', optional: true)]
    public ?string $policyNumber;

    /**
     * Premium amount.
     */
    #[Api('premium_amount', optional: true)]
    public ?float $premiumAmount;

    /**
     * Frequency of premium payment (e.g., Annual, Monthly).
     */
    #[Api('premium_frequency', optional: true)]
    public ?string $premiumFrequency;

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
    #[Api('sum_assured', optional: true)]
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
        $obj = new self;

        null !== $additionalInfo && $obj->additionalInfo = $additionalInfo;
        null !== $lifeAssured && $obj->lifeAssured = $lifeAssured;
        null !== $policyName && $obj->policyName = $policyName;
        null !== $policyNumber && $obj->policyNumber = $policyNumber;
        null !== $premiumAmount && $obj->premiumAmount = $premiumAmount;
        null !== $premiumFrequency && $obj->premiumFrequency = $premiumFrequency;
        null !== $provider && $obj->provider = $provider;
        null !== $status && $obj->status = $status;
        null !== $sumAssured && $obj->sumAssured = $sumAssured;

        return $obj;
    }

    /**
     * Additional information specific to the policy.
     */
    public function withAdditionalInfo(mixed $additionalInfo): self
    {
        $obj = clone $this;
        $obj->additionalInfo = $additionalInfo;

        return $obj;
    }

    /**
     * Name of the life assured.
     */
    public function withLifeAssured(string $lifeAssured): self
    {
        $obj = clone $this;
        $obj->lifeAssured = $lifeAssured;

        return $obj;
    }

    /**
     * Name of the insurance policy.
     */
    public function withPolicyName(string $policyName): self
    {
        $obj = clone $this;
        $obj->policyName = $policyName;

        return $obj;
    }

    /**
     * Insurance policy number.
     */
    public function withPolicyNumber(string $policyNumber): self
    {
        $obj = clone $this;
        $obj->policyNumber = $policyNumber;

        return $obj;
    }

    /**
     * Premium amount.
     */
    public function withPremiumAmount(float $premiumAmount): self
    {
        $obj = clone $this;
        $obj->premiumAmount = $premiumAmount;

        return $obj;
    }

    /**
     * Frequency of premium payment (e.g., Annual, Monthly).
     */
    public function withPremiumFrequency(string $premiumFrequency): self
    {
        $obj = clone $this;
        $obj->premiumFrequency = $premiumFrequency;

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
        $obj->sumAssured = $sumAssured;

        return $obj;
    }
}
