<?php

declare(strict_types=1);

namespace CasParser\AccessToken;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Concerns\SdkParams;
use CasParser\Core\Contracts\BaseModel;

/**
 * Generate a short-lived access token from your API key.
 *
 * **Use this endpoint from your backend** to create tokens that can be safely passed to frontend/SDK.
 *
 * Access tokens:
 * - Are prefixed with `at_` for easy identification
 * - Valid for up to 60 minutes
 * - Can be used in place of API keys on all v4 endpoints
 * - Cannot be used to generate other access tokens
 *
 * @see CasParser\Services\AccessTokenService::create()
 *
 * @phpstan-type AccessTokenCreateParamsShape = array{expiryMinutes?: int|null}
 */
final class AccessTokenCreateParams implements BaseModel
{
    /** @use SdkModel<AccessTokenCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Token validity in minutes (max 60).
     */
    #[Optional('expiry_minutes')]
    public ?int $expiryMinutes;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $expiryMinutes = null): self
    {
        $self = new self;

        null !== $expiryMinutes && $self['expiryMinutes'] = $expiryMinutes;

        return $self;
    }

    /**
     * Token validity in minutes (max 60).
     */
    public function withExpiryMinutes(int $expiryMinutes): self
    {
        $self = clone $this;
        $self['expiryMinutes'] = $expiryMinutes;

        return $self;
    }
}
