<?php

declare(strict_types=1);

namespace CasParser\Inbox;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Attributes\Required;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Concerns\SdkParams;
use CasParser\Core\Contracts\BaseModel;
use CasParser\Inbox\InboxConnectEmailParams\Provider;

/**
 * Initiate OAuth flow to connect user's email inbox.
 *
 * Returns an `oauth_url` that you should redirect the user to. After authorization,
 * they are redirected back to your `redirect_uri` with the following query parameters:
 *
 * **On success:**
 * - `inbox_token` - Encrypted token to store client-side
 * - `email` - Email address of the connected account
 * - `state` - Your original state parameter (for CSRF verification)
 *
 * **On error:**
 * - `error` - Error code (e.g., `access_denied`, `token_exchange_failed`)
 * - `state` - Your original state parameter
 *
 * **Store the `inbox_token` client-side** and use it for all subsequent inbox API calls.
 * The token is long-lived (it stores an encrypted refresh token), so a single OAuth
 * connect gives ongoing access to both historical and future CAS statements in the
 * user's inbox. Reuse the same token until the user revokes access via
 * `/v4/inbox/disconnect` or their provider's account settings.
 *
 * @see CasParser\Services\InboxService::connectEmail()
 *
 * @phpstan-type InboxConnectEmailParamsShape = array{
 *   redirectUri: string,
 *   provider?: null|Provider|value-of<Provider>,
 *   state?: string|null,
 * }
 */
final class InboxConnectEmailParams implements BaseModel
{
    /** @use SdkModel<InboxConnectEmailParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Your callback URL to receive the inbox_token (must be http or https).
     */
    #[Required('redirect_uri')]
    public string $redirectUri;

    /**
     * Mail provider to connect. Defaults to `gmail`.
     *
     * - `gmail` - Google accounts: `@gmail.com` and Google
     *   Workspace domains.
     * - `outlook` - personal Microsoft accounts: `@outlook.com`,
     *   `@hotmail.com`, `@live.com`, `@msn.com` and localised
     *   variants (`@hotmail.co.uk`, `@live.in`, `@hotmail.fr`).
     *   Any other address registered as a personal Microsoft
     *   account also works, including custom domains.
     * - `zoho` - Zoho Mail accounts, including custom domains
     *   hosted on Zoho.
     *
     * Any unrecognised value is treated as `gmail`. The resolved
     * provider is returned in the response.
     *
     * @var value-of<Provider>|null $provider
     */
    #[Optional(enum: Provider::class)]
    public ?string $provider;

    /**
     * State parameter for CSRF protection (returned in redirect).
     */
    #[Optional]
    public ?string $state;

    /**
     * `new InboxConnectEmailParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InboxConnectEmailParams::with(redirectUri: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new InboxConnectEmailParams)->withRedirectUri(...)
     * ```
     */
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
        string $redirectUri,
        Provider|string|null $provider = null,
        ?string $state = null
    ): self {
        $self = new self;

        $self['redirectUri'] = $redirectUri;

        null !== $provider && $self['provider'] = $provider;
        null !== $state && $self['state'] = $state;

        return $self;
    }

    /**
     * Your callback URL to receive the inbox_token (must be http or https).
     */
    public function withRedirectUri(string $redirectUri): self
    {
        $self = clone $this;
        $self['redirectUri'] = $redirectUri;

        return $self;
    }

    /**
     * Mail provider to connect. Defaults to `gmail`.
     *
     * - `gmail` - Google accounts: `@gmail.com` and Google
     *   Workspace domains.
     * - `outlook` - personal Microsoft accounts: `@outlook.com`,
     *   `@hotmail.com`, `@live.com`, `@msn.com` and localised
     *   variants (`@hotmail.co.uk`, `@live.in`, `@hotmail.fr`).
     *   Any other address registered as a personal Microsoft
     *   account also works, including custom domains.
     * - `zoho` - Zoho Mail accounts, including custom domains
     *   hosted on Zoho.
     *
     * Any unrecognised value is treated as `gmail`. The resolved
     * provider is returned in the response.
     *
     * @param Provider|value-of<Provider> $provider
     */
    public function withProvider(Provider|string $provider): self
    {
        $self = clone $this;
        $self['provider'] = $provider;

        return $self;
    }

    /**
     * State parameter for CSRF protection (returned in redirect).
     */
    public function withState(string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }
}
