<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse;

use CasParser\CasParser\UnifiedResponse\Insurance\LifeInsurancePolicy;
use CasParser\Core\Attributes\Api;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type InsuranceShape = array{
 *   life_insurance_policies?: list<LifeInsurancePolicy>|null
 * }
 */
final class Insurance implements BaseModel
{
    /** @use SdkModel<InsuranceShape> */
    use SdkModel;

    /** @var list<LifeInsurancePolicy>|null $life_insurance_policies */
    #[Api(list: LifeInsurancePolicy::class, optional: true)]
    public ?array $life_insurance_policies;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<LifeInsurancePolicy> $life_insurance_policies
     */
    public static function with(?array $life_insurance_policies = null): self
    {
        $obj = new self;

        null !== $life_insurance_policies && $obj->life_insurance_policies = $life_insurance_policies;

        return $obj;
    }

    /**
     * @param list<LifeInsurancePolicy> $lifeInsurancePolicies
     */
    public function withLifeInsurancePolicies(
        array $lifeInsurancePolicies
    ): self {
        $obj = clone $this;
        $obj->life_insurance_policies = $lifeInsurancePolicies;

        return $obj;
    }
}
