<?php

declare(strict_types=1);

namespace CasParser\VerifyToken;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type VerifyTokenVerifyResponseShape = array{
 *   error?: string|null, maskedAPIKey?: string|null, valid?: bool|null
 * }
 */
final class VerifyTokenVerifyResponse implements BaseModel
{
    /** @use SdkModel<VerifyTokenVerifyResponseShape> */
    use SdkModel;

    /**
     * Error message (only shown if invalid).
     */
    #[Optional]
    public ?string $error;

    /**
     * Masked API key (only shown if valid).
     */
    #[Optional('masked_api_key')]
    public ?string $maskedAPIKey;

    /**
     * Whether the token is valid.
     */
    #[Optional]
    public ?bool $valid;

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
        ?string $error = null,
        ?string $maskedAPIKey = null,
        ?bool $valid = null
    ): self {
        $self = new self;

        null !== $error && $self['error'] = $error;
        null !== $maskedAPIKey && $self['maskedAPIKey'] = $maskedAPIKey;
        null !== $valid && $self['valid'] = $valid;

        return $self;
    }

    /**
     * Error message (only shown if invalid).
     */
    public function withError(string $error): self
    {
        $self = clone $this;
        $self['error'] = $error;

        return $self;
    }

    /**
     * Masked API key (only shown if valid).
     */
    public function withMaskedAPIKey(string $maskedAPIKey): self
    {
        $self = clone $this;
        $self['maskedAPIKey'] = $maskedAPIKey;

        return $self;
    }

    /**
     * Whether the token is valid.
     */
    public function withValid(bool $valid): self
    {
        $self = clone $this;
        $self['valid'] = $valid;

        return $self;
    }
}
