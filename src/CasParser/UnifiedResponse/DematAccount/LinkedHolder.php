<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse\DematAccount;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type LinkedHolderShape = array{name?: string|null, pan?: string|null}
 */
final class LinkedHolder implements BaseModel
{
    /** @use SdkModel<LinkedHolderShape> */
    use SdkModel;

    /**
     * Name of the account holder.
     */
    #[Optional]
    public ?string $name;

    /**
     * PAN of the account holder.
     */
    #[Optional]
    public ?string $pan;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $name = null, ?string $pan = null): self
    {
        $self = new self;

        null !== $name && $self['name'] = $name;
        null !== $pan && $self['pan'] = $pan;

        return $self;
    }

    /**
     * Name of the account holder.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * PAN of the account holder.
     */
    public function withPan(string $pan): self
    {
        $self = clone $this;
        $self['pan'] = $pan;

        return $self;
    }
}
