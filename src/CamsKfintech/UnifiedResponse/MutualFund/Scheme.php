<?php

declare(strict_types=1);

namespace CasParser\CamsKfintech\UnifiedResponse\MutualFund;

use CasParser\CamsKfintech\Transaction;
use CasParser\CamsKfintech\UnifiedResponse\MutualFund\Scheme\AdditionalInfo;
use CasParser\CamsKfintech\UnifiedResponse\MutualFund\Scheme\Gain;
use CasParser\CamsKfintech\UnifiedResponse\MutualFund\Scheme\Type;
use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AdditionalInfoShape from \CasParser\CamsKfintech\UnifiedResponse\MutualFund\Scheme\AdditionalInfo
 * @phpstan-import-type GainShape from \CasParser\CamsKfintech\UnifiedResponse\MutualFund\Scheme\Gain
 * @phpstan-import-type TransactionShape from \CasParser\CamsKfintech\Transaction
 *
 * @phpstan-type SchemeShape = array{
 *   additionalInfo?: null|\CasParser\CamsKfintech\UnifiedResponse\MutualFund\Scheme\AdditionalInfo|AdditionalInfoShape,
 *   cost?: float|null,
 *   gain?: null|Gain|GainShape,
 *   isin?: string|null,
 *   name?: string|null,
 *   nav?: float|null,
 *   nominees?: list<string>|null,
 *   transactions?: list<Transaction|TransactionShape>|null,
 *   type?: null|Type|value-of<Type>,
 *   units?: float|null,
 *   value?: float|null,
 * }
 */
final class Scheme implements BaseModel
{
    /** @use SdkModel<SchemeShape> */
    use SdkModel;

    /**
     * Additional information specific to the scheme.
     */
    #[Optional('additional_info')]
    public ?AdditionalInfo $additionalInfo;

    /**
     * Cost of investment.
     */
    #[Optional]
    public ?float $cost;

    #[Optional]
    public ?Gain $gain;

    /**
     * ISIN code of the scheme.
     */
    #[Optional]
    public ?string $isin;

    /**
     * Scheme name.
     */
    #[Optional]
    public ?string $name;

    /**
     * Net Asset Value per unit.
     */
    #[Optional]
    public ?float $nav;

    /**
     * List of nominees.
     *
     * @var list<string>|null $nominees
     */
    #[Optional(list: 'string')]
    public ?array $nominees;

    /** @var list<Transaction>|null $transactions */
    #[Optional(list: Transaction::class)]
    public ?array $transactions;

    /**
     * Type of mutual fund scheme.
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
    public ?string $type;

    /**
     * Number of units held.
     */
    #[Optional]
    public ?float $units;

    /**
     * Current market value of the holding.
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
     * @param AdditionalInfo|AdditionalInfoShape|null $additionalInfo
     * @param Gain|GainShape|null $gain
     * @param list<string>|null $nominees
     * @param list<Transaction|TransactionShape>|null $transactions
     * @param Type|value-of<Type>|null $type
     */
    public static function with(
        AdditionalInfo|array|null $additionalInfo = null,
        ?float $cost = null,
        Gain|array|null $gain = null,
        ?string $isin = null,
        ?string $name = null,
        ?float $nav = null,
        ?array $nominees = null,
        ?array $transactions = null,
        Type|string|null $type = null,
        ?float $units = null,
        ?float $value = null,
    ): self {
        $self = new self;

        null !== $additionalInfo && $self['additionalInfo'] = $additionalInfo;
        null !== $cost && $self['cost'] = $cost;
        null !== $gain && $self['gain'] = $gain;
        null !== $isin && $self['isin'] = $isin;
        null !== $name && $self['name'] = $name;
        null !== $nav && $self['nav'] = $nav;
        null !== $nominees && $self['nominees'] = $nominees;
        null !== $transactions && $self['transactions'] = $transactions;
        null !== $type && $self['type'] = $type;
        null !== $units && $self['units'] = $units;
        null !== $value && $self['value'] = $value;

        return $self;
    }

    /**
     * Additional information specific to the scheme.
     *
     * @param AdditionalInfo|AdditionalInfoShape $additionalInfo
     */
    public function withAdditionalInfo(
        AdditionalInfo|array $additionalInfo,
    ): self {
        $self = clone $this;
        $self['additionalInfo'] = $additionalInfo;

        return $self;
    }

    /**
     * Cost of investment.
     */
    public function withCost(float $cost): self
    {
        $self = clone $this;
        $self['cost'] = $cost;

        return $self;
    }

    /**
     * @param Gain|GainShape $gain
     */
    public function withGain(Gain|array $gain): self
    {
        $self = clone $this;
        $self['gain'] = $gain;

        return $self;
    }

    /**
     * ISIN code of the scheme.
     */
    public function withIsin(string $isin): self
    {
        $self = clone $this;
        $self['isin'] = $isin;

        return $self;
    }

    /**
     * Scheme name.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Net Asset Value per unit.
     */
    public function withNav(float $nav): self
    {
        $self = clone $this;
        $self['nav'] = $nav;

        return $self;
    }

    /**
     * List of nominees.
     *
     * @param list<string> $nominees
     */
    public function withNominees(array $nominees): self
    {
        $self = clone $this;
        $self['nominees'] = $nominees;

        return $self;
    }

    /**
     * @param list<Transaction|TransactionShape> $transactions
     */
    public function withTransactions(array $transactions): self
    {
        $self = clone $this;
        $self['transactions'] = $transactions;

        return $self;
    }

    /**
     * Type of mutual fund scheme.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Number of units held.
     */
    public function withUnits(float $units): self
    {
        $self = clone $this;
        $self['units'] = $units;

        return $self;
    }

    /**
     * Current market value of the holding.
     */
    public function withValue(float $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
