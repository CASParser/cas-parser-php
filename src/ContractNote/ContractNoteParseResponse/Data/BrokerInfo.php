<?php

declare(strict_types=1);

namespace CasParser\ContractNote\ContractNoteParseResponse\Data;

use CasParser\ContractNote\ContractNoteParseResponse\Data\BrokerInfo\BrokerType;
use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type BrokerInfoShape = array{
 *   brokerType?: null|BrokerType|value-of<BrokerType>,
 *   name?: string|null,
 *   sebiRegistration?: string|null,
 * }
 */
final class BrokerInfo implements BaseModel
{
    /** @use SdkModel<BrokerInfoShape> */
    use SdkModel;

    /**
     * Auto-detected or specified broker type.
     *
     * @var value-of<BrokerType>|null $brokerType
     */
    #[Optional('broker_type', enum: BrokerType::class)]
    public ?string $brokerType;

    /**
     * Broker company name.
     */
    #[Optional]
    public ?string $name;

    /**
     * SEBI registration number of the broker.
     */
    #[Optional('sebi_registration')]
    public ?string $sebiRegistration;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param BrokerType|value-of<BrokerType>|null $brokerType
     */
    public static function with(
        BrokerType|string|null $brokerType = null,
        ?string $name = null,
        ?string $sebiRegistration = null,
    ): self {
        $self = new self;

        null !== $brokerType && $self['brokerType'] = $brokerType;
        null !== $name && $self['name'] = $name;
        null !== $sebiRegistration && $self['sebiRegistration'] = $sebiRegistration;

        return $self;
    }

    /**
     * Auto-detected or specified broker type.
     *
     * @param BrokerType|value-of<BrokerType> $brokerType
     */
    public function withBrokerType(BrokerType|string $brokerType): self
    {
        $self = clone $this;
        $self['brokerType'] = $brokerType;

        return $self;
    }

    /**
     * Broker company name.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * SEBI registration number of the broker.
     */
    public function withSebiRegistration(string $sebiRegistration): self
    {
        $self = clone $this;
        $self['sebiRegistration'] = $sebiRegistration;

        return $self;
    }
}
