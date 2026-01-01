<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse;

use CasParser\CasParser\UnifiedResponse\Meta\CasType;
use CasParser\CasParser\UnifiedResponse\Meta\StatementPeriod;
use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type StatementPeriodShape from \CasParser\CasParser\UnifiedResponse\Meta\StatementPeriod
 *
 * @phpstan-type MetaShape = array{
 *   casType?: null|CasType|value-of<CasType>,
 *   generatedAt?: \DateTimeInterface|null,
 *   statementPeriod?: null|StatementPeriod|StatementPeriodShape,
 * }
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<MetaShape> */
    use SdkModel;

    /**
     * Type of CAS detected and processed.
     *
     * @var value-of<CasType>|null $casType
     */
    #[Optional('cas_type', enum: CasType::class)]
    public ?string $casType;

    /**
     * Timestamp when the response was generated.
     */
    #[Optional('generated_at')]
    public ?\DateTimeInterface $generatedAt;

    #[Optional('statement_period')]
    public ?StatementPeriod $statementPeriod;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CasType|value-of<CasType>|null $casType
     * @param StatementPeriod|StatementPeriodShape|null $statementPeriod
     */
    public static function with(
        CasType|string|null $casType = null,
        ?\DateTimeInterface $generatedAt = null,
        StatementPeriod|array|null $statementPeriod = null,
    ): self {
        $self = new self;

        null !== $casType && $self['casType'] = $casType;
        null !== $generatedAt && $self['generatedAt'] = $generatedAt;
        null !== $statementPeriod && $self['statementPeriod'] = $statementPeriod;

        return $self;
    }

    /**
     * Type of CAS detected and processed.
     *
     * @param CasType|value-of<CasType> $casType
     */
    public function withCasType(CasType|string $casType): self
    {
        $self = clone $this;
        $self['casType'] = $casType;

        return $self;
    }

    /**
     * Timestamp when the response was generated.
     */
    public function withGeneratedAt(\DateTimeInterface $generatedAt): self
    {
        $self = clone $this;
        $self['generatedAt'] = $generatedAt;

        return $self;
    }

    /**
     * @param StatementPeriod|StatementPeriodShape $statementPeriod
     */
    public function withStatementPeriod(
        StatementPeriod|array $statementPeriod
    ): self {
        $self = clone $this;
        $self['statementPeriod'] = $statementPeriod;

        return $self;
    }
}
