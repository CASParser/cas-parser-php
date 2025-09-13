<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse;

use CasParser\CasParser\UnifiedResponse\Meta\CasType;
use CasParser\CasParser\UnifiedResponse\Meta\StatementPeriod;
use CasParser\Core\Attributes\Api;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type meta_alias = array{
 *   casType?: value-of<CasType>,
 *   generatedAt?: \DateTimeInterface,
 *   statementPeriod?: StatementPeriod,
 * }
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<meta_alias> */
    use SdkModel;

    /**
     * Type of CAS detected and processed.
     *
     * @var value-of<CasType>|null $casType
     */
    #[Api('cas_type', enum: CasType::class, optional: true)]
    public ?string $casType;

    /**
     * Timestamp when the response was generated.
     */
    #[Api('generated_at', optional: true)]
    public ?\DateTimeInterface $generatedAt;

    #[Api('statement_period', optional: true)]
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
     * @param CasType|value-of<CasType> $casType
     */
    public static function with(
        CasType|string|null $casType = null,
        ?\DateTimeInterface $generatedAt = null,
        ?StatementPeriod $statementPeriod = null,
    ): self {
        $obj = new self;

        null !== $casType && $obj->casType = $casType instanceof CasType ? $casType->value : $casType;
        null !== $generatedAt && $obj->generatedAt = $generatedAt;
        null !== $statementPeriod && $obj->statementPeriod = $statementPeriod;

        return $obj;
    }

    /**
     * Type of CAS detected and processed.
     *
     * @param CasType|value-of<CasType> $casType
     */
    public function withCasType(CasType|string $casType): self
    {
        $obj = clone $this;
        $obj->casType = $casType instanceof CasType ? $casType->value : $casType;

        return $obj;
    }

    /**
     * Timestamp when the response was generated.
     */
    public function withGeneratedAt(\DateTimeInterface $generatedAt): self
    {
        $obj = clone $this;
        $obj->generatedAt = $generatedAt;

        return $obj;
    }

    public function withStatementPeriod(StatementPeriod $statementPeriod): self
    {
        $obj = clone $this;
        $obj->statementPeriod = $statementPeriod;

        return $obj;
    }
}
