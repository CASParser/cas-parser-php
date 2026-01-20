<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse\DematAccount\Holdings;

use CasParser\CasParser\UnifiedResponse\DematAccount\Holdings\GovernmentSecurity\AdditionalInfo;
use CasParser\CasParser\UnifiedResponse\DematAccount\Holdings\GovernmentSecurity\Transaction;
use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AdditionalInfoShape from \CasParser\CasParser\UnifiedResponse\DematAccount\Holdings\GovernmentSecurity\AdditionalInfo
 * @phpstan-import-type TransactionShape from \CasParser\CasParser\UnifiedResponse\DematAccount\Holdings\GovernmentSecurity\Transaction
 *
 * @phpstan-type GovernmentSecurityShape = array{
 *   additionalInfo?: null|AdditionalInfo|AdditionalInfoShape,
 *   isin?: string|null,
 *   name?: string|null,
 *   transactions?: list<Transaction|TransactionShape>|null,
 *   units?: float|null,
 *   value?: float|null,
 * }
 */
final class GovernmentSecurity implements BaseModel
{
    /** @use SdkModel<GovernmentSecurityShape> */
    use SdkModel;

    /**
     * Additional information specific to the government security.
     */
    #[Optional('additional_info')]
    public ?AdditionalInfo $additionalInfo;

    /**
     * ISIN code of the government security.
     */
    #[Optional]
    public ?string $isin;

    /**
     * Name of the government security.
     */
    #[Optional]
    public ?string $name;

    /**
     * List of transactions for this holding (beta).
     *
     * @var list<Transaction>|null $transactions
     */
    #[Optional(list: Transaction::class)]
    public ?array $transactions;

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
     * @param list<Transaction|TransactionShape>|null $transactions
     */
    public static function with(
        AdditionalInfo|array|null $additionalInfo = null,
        ?string $isin = null,
        ?string $name = null,
        ?array $transactions = null,
        ?float $units = null,
        ?float $value = null,
    ): self {
        $self = new self;

        null !== $additionalInfo && $self['additionalInfo'] = $additionalInfo;
        null !== $isin && $self['isin'] = $isin;
        null !== $name && $self['name'] = $name;
        null !== $transactions && $self['transactions'] = $transactions;
        null !== $units && $self['units'] = $units;
        null !== $value && $self['value'] = $value;

        return $self;
    }

    /**
     * Additional information specific to the government security.
     *
     * @param AdditionalInfo|AdditionalInfoShape $additionalInfo
     */
    public function withAdditionalInfo(
        AdditionalInfo|array $additionalInfo
    ): self {
        $self = clone $this;
        $self['additionalInfo'] = $additionalInfo;

        return $self;
    }

    /**
     * ISIN code of the government security.
     */
    public function withIsin(string $isin): self
    {
        $self = clone $this;
        $self['isin'] = $isin;

        return $self;
    }

    /**
     * Name of the government security.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * List of transactions for this holding (beta).
     *
     * @param list<Transaction|TransactionShape> $transactions
     */
    public function withTransactions(array $transactions): self
    {
        $self = clone $this;
        $self['transactions'] = $transactions;

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
