<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse;

use CasParser\CasParser\UnifiedResponse\Insurance\LifeInsurancePolicy;
use CasParser\Core\Attributes\Api;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type InsuranceShape = array{
 *   lifeInsurancePolicies?: list<LifeInsurancePolicy>
 * }
 */
final class Insurance implements BaseModel
{
    /** @use SdkModel<InsuranceShape> */
    use SdkModel;

    /** @var list<LifeInsurancePolicy>|null $lifeInsurancePolicies */
    #[Api(
        'life_insurance_policies',
        list: LifeInsurancePolicy::class,
        optional: true
    )]
    public ?array $lifeInsurancePolicies;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<LifeInsurancePolicy> $lifeInsurancePolicies
     */
    public static function with(?array $lifeInsurancePolicies = null): self
    {
        $obj = new self;

        null !== $lifeInsurancePolicies && $obj->lifeInsurancePolicies = $lifeInsurancePolicies;

        return $obj;
    }

    /**
     * @param list<LifeInsurancePolicy> $lifeInsurancePolicies
     */
    public function withLifeInsurancePolicies(
        array $lifeInsurancePolicies
    ): self {
        $obj = clone $this;
        $obj->lifeInsurancePolicies = $lifeInsurancePolicies;

        return $obj;
    }
}
