<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse;

use CasParser\CasParser\UnifiedResponse\Insurance\LifeInsurancePolicy;
use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type LifeInsurancePolicyShape from \CasParser\CasParser\UnifiedResponse\Insurance\LifeInsurancePolicy
 *
 * @phpstan-type InsuranceShape = array{
 *   lifeInsurancePolicies?: list<LifeInsurancePolicyShape>|null
 * }
 */
final class Insurance implements BaseModel
{
    /** @use SdkModel<InsuranceShape> */
    use SdkModel;

    /** @var list<LifeInsurancePolicy>|null $lifeInsurancePolicies */
    #[Optional('life_insurance_policies', list: LifeInsurancePolicy::class)]
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
     * @param list<LifeInsurancePolicyShape>|null $lifeInsurancePolicies
     */
    public static function with(?array $lifeInsurancePolicies = null): self
    {
        $self = new self;

        null !== $lifeInsurancePolicies && $self['lifeInsurancePolicies'] = $lifeInsurancePolicies;

        return $self;
    }

    /**
     * @param list<LifeInsurancePolicyShape> $lifeInsurancePolicies
     */
    public function withLifeInsurancePolicies(
        array $lifeInsurancePolicies
    ): self {
        $self = clone $this;
        $self['lifeInsurancePolicies'] = $lifeInsurancePolicies;

        return $self;
    }
}
