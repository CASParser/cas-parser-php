<?php

declare(strict_types=1);

namespace CasParser\Inbox;

use CasParser\Core\Attributes\Required;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Concerns\SdkParams;
use CasParser\Core\Contracts\BaseModel;

/**
 * Revoke email access and invalidate the token.
 *
 * This calls the provider's token revocation API (e.g., Google's revoke endpoint)
 * to ensure the user's consent is properly removed.
 *
 * After calling this, the `inbox_token` becomes unusable.
 *
 * @see CasParser\Services\InboxService::disconnectEmail()
 *
 * @phpstan-type InboxDisconnectEmailParamsShape = array{xInboxToken: string}
 */
final class InboxDisconnectEmailParams implements BaseModel
{
    /** @use SdkModel<InboxDisconnectEmailParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $xInboxToken;

    /**
     * `new InboxDisconnectEmailParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InboxDisconnectEmailParams::with(xInboxToken: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new InboxDisconnectEmailParams)->withXInboxToken(...)
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
    public static function with(string $xInboxToken): self
    {
        $self = new self;

        $self['xInboxToken'] = $xInboxToken;

        return $self;
    }

    public function withXInboxToken(string $xInboxToken): self
    {
        $self = clone $this;
        $self['xInboxToken'] = $xInboxToken;

        return $self;
    }
}
