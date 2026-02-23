<?php

declare(strict_types=1);

namespace CasParser\AccessToken;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type AccessTokenNewResponseShape = array{
 *   accessToken?: string|null, expiresIn?: int|null, tokenType?: string|null
 * }
 */
final class AccessTokenNewResponse implements BaseModel
{
    /** @use SdkModel<AccessTokenNewResponseShape> */
    use SdkModel;

    /**
     * The at_ prefixed access token.
     */
    #[Optional('access_token')]
    public ?string $accessToken;

    /**
     * Token validity in seconds.
     */
    #[Optional('expires_in')]
    public ?int $expiresIn;

    /**
     * Always "api_key" - token is a drop-in replacement for x-api-key header.
     */
    #[Optional('token_type')]
    public ?string $tokenType;

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
        ?string $accessToken = null,
        ?int $expiresIn = null,
        ?string $tokenType = null
    ): self {
        $self = new self;

        null !== $accessToken && $self['accessToken'] = $accessToken;
        null !== $expiresIn && $self['expiresIn'] = $expiresIn;
        null !== $tokenType && $self['tokenType'] = $tokenType;

        return $self;
    }

    /**
     * The at_ prefixed access token.
     */
    public function withAccessToken(string $accessToken): self
    {
        $self = clone $this;
        $self['accessToken'] = $accessToken;

        return $self;
    }

    /**
     * Token validity in seconds.
     */
    public function withExpiresIn(int $expiresIn): self
    {
        $self = clone $this;
        $self['expiresIn'] = $expiresIn;

        return $self;
    }

    /**
     * Always "api_key" - token is a drop-in replacement for x-api-key header.
     */
    public function withTokenType(string $tokenType): self
    {
        $self = clone $this;
        $self['tokenType'] = $tokenType;

        return $self;
    }
}
