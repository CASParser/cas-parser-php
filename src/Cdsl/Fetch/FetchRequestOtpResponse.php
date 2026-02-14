<?php

declare(strict_types=1);

namespace CasParser\Cdsl\Fetch;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type FetchRequestOtpResponseShape = array{
 *   msg?: string|null, sessionID?: string|null, status?: string|null
 * }
 */
final class FetchRequestOtpResponse implements BaseModel
{
    /** @use SdkModel<FetchRequestOtpResponseShape> */
    use SdkModel;

    #[Optional]
    public ?string $msg;

    /**
     * Session ID for verify step.
     */
    #[Optional('session_id')]
    public ?string $sessionID;

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
        ?string $msg = null,
        ?string $sessionID = null,
        ?string $status = null
    ): self {
        $self = new self;

        null !== $msg && $self['msg'] = $msg;
        null !== $sessionID && $self['sessionID'] = $sessionID;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    public function withMsg(string $msg): self
    {
        $self = clone $this;
        $self['msg'] = $msg;

        return $self;
    }

    /**
     * Session ID for verify step.
     */
    public function withSessionID(string $sessionID): self
    {
        $self = clone $this;
        $self['sessionID'] = $sessionID;

        return $self;
    }

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
