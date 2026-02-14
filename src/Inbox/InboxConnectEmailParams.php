<?php

declare(strict_types=1);

namespace CasParser\Inbox;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Attributes\Required;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Concerns\SdkParams;
use CasParser\Core\Contracts\BaseModel;

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
 *
 * @see CasParser\Services\InboxService::connectEmail()
 *
 * @phpstan-type InboxConnectEmailParamsShape = array{
 *   redirectUri: string, state?: string|null
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
     */
    public static function with(string $redirectUri, ?string $state = null): self
    {
        $self = new self;

        $self['redirectUri'] = $redirectUri;

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
     * State parameter for CSRF protection (returned in redirect).
     */
    public function withState(string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }
}
