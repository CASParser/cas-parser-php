<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse\MutualFund;

use CasParser\CasParser\UnifiedResponse\MutualFund\Scheme\AdditionalInfo;
use CasParser\CasParser\UnifiedResponse\MutualFund\Scheme\Gain;
use CasParser\CasParser\UnifiedResponse\MutualFund\Scheme\Transaction;
use CasParser\CasParser\UnifiedResponse\MutualFund\Scheme\Type;
use CasParser\Core\Attributes\Api;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type scheme_alias = array{
 *   additionalInfo?: AdditionalInfo|null,
 *   cost?: float|null,
 *   gain?: Gain|null,
 *   isin?: string|null,
 *   name?: string|null,
 *   nav?: float|null,
 *   nominees?: list<string>|null,
 *   transactions?: list<Transaction>|null,
 *   type?: Type::*|null,
 *   units?: float|null,
 *   value?: float|null,
 * }
 */
final class Scheme implements BaseModel
{
    /** @use SdkModel<scheme_alias> */
    use SdkModel;

    /**
     * Additional information specific to the scheme.
     */
    #[Api('additional_info', optional: true)]
    public ?AdditionalInfo $additionalInfo;

    /**
     * Cost of investment.
     */
    #[Api(optional: true)]
    public ?float $cost;

    #[Api(optional: true)]
    public ?Gain $gain;

    /**
     * ISIN code of the scheme.
     */
    #[Api(optional: true)]
    public ?string $isin;

    /**
     * Scheme name.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * Net Asset Value per unit.
     */
    #[Api(optional: true)]
    public ?float $nav;

    /**
     * List of nominees.
     *
     * @var list<string>|null $nominees
     */
    #[Api(list: 'string', optional: true)]
    public ?array $nominees;

    /** @var list<Transaction>|null $transactions */
    #[Api(list: Transaction::class, optional: true)]
    public ?array $transactions;

    /**
     * Type of mutual fund scheme.
     *
     * @var Type::*|null $type
     */
    #[Api(enum: Type::class, optional: true)]
    public ?string $type;

    /**
     * Number of units held.
     */
    #[Api(optional: true)]
    public ?float $units;

    /**
     * Current market value of the holding.
     */
    #[Api(optional: true)]
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
     * @param list<string> $nominees
     * @param list<Transaction> $transactions
     * @param Type::* $type
     */
    public static function with(
        ?AdditionalInfo $additionalInfo = null,
        ?float $cost = null,
        ?Gain $gain = null,
        ?string $isin = null,
        ?string $name = null,
        ?float $nav = null,
        ?array $nominees = null,
        ?array $transactions = null,
        ?string $type = null,
        ?float $units = null,
        ?float $value = null,
    ): self {
        $obj = new self;

        null !== $additionalInfo && $obj->additionalInfo = $additionalInfo;
        null !== $cost && $obj->cost = $cost;
        null !== $gain && $obj->gain = $gain;
        null !== $isin && $obj->isin = $isin;
        null !== $name && $obj->name = $name;
        null !== $nav && $obj->nav = $nav;
        null !== $nominees && $obj->nominees = $nominees;
        null !== $transactions && $obj->transactions = $transactions;
        null !== $type && $obj->type = $type;
        null !== $units && $obj->units = $units;
        null !== $value && $obj->value = $value;

        return $obj;
    }

    /**
     * Additional information specific to the scheme.
     */
    public function withAdditionalInfo(AdditionalInfo $additionalInfo): self
    {
        $obj = clone $this;
        $obj->additionalInfo = $additionalInfo;

        return $obj;
    }

    /**
     * Cost of investment.
     */
    public function withCost(float $cost): self
    {
        $obj = clone $this;
        $obj->cost = $cost;

        return $obj;
    }

    public function withGain(Gain $gain): self
    {
        $obj = clone $this;
        $obj->gain = $gain;

        return $obj;
    }

    /**
     * ISIN code of the scheme.
     */
    public function withIsin(string $isin): self
    {
        $obj = clone $this;
        $obj->isin = $isin;

        return $obj;
    }

    /**
     * Scheme name.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Net Asset Value per unit.
     */
    public function withNav(float $nav): self
    {
        $obj = clone $this;
        $obj->nav = $nav;

        return $obj;
    }

    /**
     * List of nominees.
     *
     * @param list<string> $nominees
     */
    public function withNominees(array $nominees): self
    {
        $obj = clone $this;
        $obj->nominees = $nominees;

        return $obj;
    }

    /**
     * @param list<Transaction> $transactions
     */
    public function withTransactions(array $transactions): self
    {
        $obj = clone $this;
        $obj->transactions = $transactions;

        return $obj;
    }

    /**
     * Type of mutual fund scheme.
     *
     * @param Type::* $type
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj->type = $type;

        return $obj;
    }

    /**
     * Number of units held.
     */
    public function withUnits(float $units): self
    {
        $obj = clone $this;
        $obj->units = $units;

        return $obj;
    }

    /**
     * Current market value of the holding.
     */
    public function withValue(float $value): self
    {
        $obj = clone $this;
        $obj->value = $value;

        return $obj;
    }
}
