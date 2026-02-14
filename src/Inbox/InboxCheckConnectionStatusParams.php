<?php

declare(strict_types=1);

namespace CasParser\Inbox;

use CasParser\Core\Attributes\Required;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Concerns\SdkParams;
use CasParser\Core\Contracts\BaseModel;

/**
 * Verify if an `inbox_token` is still valid and check connection status.
 *
 * Use this to check if the user needs to re-authenticate (e.g., if they
 * revoked access in their email provider settings).
 *
 * @see CasParser\Services\InboxService::checkConnectionStatus()
 *
 * @phpstan-type InboxCheckConnectionStatusParamsShape = array{xInboxToken: string}
 */
final class InboxCheckConnectionStatusParams implements BaseModel
{
    /** @use SdkModel<InboxCheckConnectionStatusParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $xInboxToken;

    /**
     * `new InboxCheckConnectionStatusParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InboxCheckConnectionStatusParams::with(xInboxToken: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new InboxCheckConnectionStatusParams)->withXInboxToken(...)
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
