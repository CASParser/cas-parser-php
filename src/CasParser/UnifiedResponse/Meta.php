<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse;

use CasParser\CasParser\UnifiedResponse\Meta\CasType;
use CasParser\CasParser\UnifiedResponse\Meta\StatementPeriod;
use CasParser\Core\Attributes\Api;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type MetaShape = array{
 *   cas_type?: value-of<CasType>|null,
 *   generated_at?: \DateTimeInterface|null,
 *   statement_period?: StatementPeriod|null,
 * }
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<MetaShape> */
    use SdkModel;

    /**
     * Type of CAS detected and processed.
     *
     * @var value-of<CasType>|null $cas_type
     */
    #[Api(enum: CasType::class, optional: true)]
    public ?string $cas_type;

    /**
     * Timestamp when the response was generated.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $generated_at;

    #[Api(optional: true)]
    public ?StatementPeriod $statement_period;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CasType|value-of<CasType> $cas_type
     */
    public static function with(
        CasType|string|null $cas_type = null,
        ?\DateTimeInterface $generated_at = null,
        ?StatementPeriod $statement_period = null,
    ): self {
        $obj = new self;

        null !== $cas_type && $obj['cas_type'] = $cas_type;
        null !== $generated_at && $obj->generated_at = $generated_at;
        null !== $statement_period && $obj->statement_period = $statement_period;

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
        $obj['cas_type'] = $casType;

        return $obj;
    }

    /**
     * Timestamp when the response was generated.
     */
    public function withGeneratedAt(\DateTimeInterface $generatedAt): self
    {
        $obj = clone $this;
        $obj->generated_at = $generatedAt;

        return $obj;
    }

    public function withStatementPeriod(StatementPeriod $statementPeriod): self
    {
        $obj = clone $this;
        $obj->statement_period = $statementPeriod;

        return $obj;
    }
}
