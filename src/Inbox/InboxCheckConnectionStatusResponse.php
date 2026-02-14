<?php

declare(strict_types=1);

namespace CasParser\Inbox;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type InboxCheckConnectionStatusResponseShape = array{
 *   connected?: bool|null,
 *   email?: string|null,
 *   provider?: string|null,
 *   status?: string|null,
 * }
 */
final class InboxCheckConnectionStatusResponse implements BaseModel
{
    /** @use SdkModel<InboxCheckConnectionStatusResponseShape> */
    use SdkModel;

    /**
     * Whether the token is valid and usable.
     */
    #[Optional]
    public ?bool $connected;

    /**
     * Email address of the connected account.
     */
    #[Optional]
    public ?string $email;

    #[Optional]
    public ?string $provider;

    #[Optional]
    public ?string $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?bool $connected = null,
        ?string $email = null,
        ?string $provider = null,
        ?string $status = null,
    ): self {
        $self = new self;

        null !== $connected && $self['connected'] = $connected;
        null !== $email && $self['email'] = $email;
        null !== $provider && $self['provider'] = $provider;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    /**
     * Whether the token is valid and usable.
     */
    public function withConnected(bool $connected): self
    {
        $self = clone $this;
        $self['connected'] = $connected;

        return $self;
    }

    /**
     * Email address of the connected account.
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    public function withProvider(string $provider): self
    {
        $self = clone $this;
        $self['provider'] = $provider;

        return $self;
    }

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
