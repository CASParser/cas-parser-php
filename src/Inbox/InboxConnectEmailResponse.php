<?php

declare(strict_types=1);

namespace CasParser\Inbox;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;
use CasParser\Inbox\InboxConnectEmailResponse\Provider;

/**
 * @phpstan-type InboxConnectEmailResponseShape = array{
 *   expiresIn?: int|null,
 *   oauthURL?: string|null,
 *   provider?: null|Provider|value-of<Provider>,
 *   status?: string|null,
 * }
 */
final class InboxConnectEmailResponse implements BaseModel
{
    /** @use SdkModel<InboxConnectEmailResponseShape> */
    use SdkModel;

    /**
     * Seconds until the OAuth URL expires (typically 10 minutes).
     */
    #[Optional('expires_in')]
    public ?int $expiresIn;

    /**
     * Redirect user to this URL to start OAuth flow.
     */
    #[Optional('oauth_url')]
    public ?string $oauthURL;

    /**
     * The provider this OAuth URL was generated for.
     *
     * @var value-of<Provider>|null $provider
     */
    #[Optional(enum: Provider::class)]
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
     *
     * @param Provider|value-of<Provider>|null $provider
     */
    public static function with(
        ?int $expiresIn = null,
        ?string $oauthURL = null,
        Provider|string|null $provider = null,
        ?string $status = null,
    ): self {
        $self = new self;

        null !== $expiresIn && $self['expiresIn'] = $expiresIn;
        null !== $oauthURL && $self['oauthURL'] = $oauthURL;
        null !== $provider && $self['provider'] = $provider;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    /**
     * Seconds until the OAuth URL expires (typically 10 minutes).
     */
    public function withExpiresIn(int $expiresIn): self
    {
        $self = clone $this;
        $self['expiresIn'] = $expiresIn;

        return $self;
    }

    /**
     * Redirect user to this URL to start OAuth flow.
     */
    public function withOAuthURL(string $oauthURL): self
    {
        $self = clone $this;
        $self['oauthURL'] = $oauthURL;

        return $self;
    }

    /**
     * The provider this OAuth URL was generated for.
     *
     * @param Provider|value-of<Provider> $provider
     */
    public function withProvider(Provider|string $provider): self
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
