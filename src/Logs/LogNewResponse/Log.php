<?php

declare(strict_types=1);

namespace CasParser\Logs\LogNewResponse;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type LogShape = array{
 *   credits?: float|null,
 *   feature?: string|null,
 *   path?: string|null,
 *   requestID?: string|null,
 *   statusCode?: int|null,
 *   timestamp?: \DateTimeInterface|null,
 * }
 */
final class Log implements BaseModel
{
    /** @use SdkModel<LogShape> */
    use SdkModel;

    /**
     * Credits consumed for this request.
     */
    #[Optional]
    public ?float $credits;

    /**
     * API feature used.
     */
    #[Optional]
    public ?string $feature;

    /**
     * API endpoint path.
     */
    #[Optional]
    public ?string $path;

    /**
     * Unique request identifier.
     */
    #[Optional('request_id')]
    public ?string $requestID;

    /**
     * HTTP response status code.
     */
    #[Optional('status_code')]
    public ?int $statusCode;

    /**
     * When the request was made.
     */
    #[Optional]
    public ?\DateTimeInterface $timestamp;

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
        ?float $credits = null,
        ?string $feature = null,
        ?string $path = null,
        ?string $requestID = null,
        ?int $statusCode = null,
        ?\DateTimeInterface $timestamp = null,
    ): self {
        $self = new self;

        null !== $credits && $self['credits'] = $credits;
        null !== $feature && $self['feature'] = $feature;
        null !== $path && $self['path'] = $path;
        null !== $requestID && $self['requestID'] = $requestID;
        null !== $statusCode && $self['statusCode'] = $statusCode;
        null !== $timestamp && $self['timestamp'] = $timestamp;

        return $self;
    }

    /**
     * Credits consumed for this request.
     */
    public function withCredits(float $credits): self
    {
        $self = clone $this;
        $self['credits'] = $credits;

        return $self;
    }

    /**
     * API feature used.
     */
    public function withFeature(string $feature): self
    {
        $self = clone $this;
        $self['feature'] = $feature;

        return $self;
    }

    /**
     * API endpoint path.
     */
    public function withPath(string $path): self
    {
        $self = clone $this;
        $self['path'] = $path;

        return $self;
    }

    /**
     * Unique request identifier.
     */
    public function withRequestID(string $requestID): self
    {
        $self = clone $this;
        $self['requestID'] = $requestID;

        return $self;
    }

    /**
     * HTTP response status code.
     */
    public function withStatusCode(int $statusCode): self
    {
        $self = clone $this;
        $self['statusCode'] = $statusCode;

        return $self;
    }

    /**
     * When the request was made.
     */
    public function withTimestamp(\DateTimeInterface $timestamp): self
    {
        $self = clone $this;
        $self['timestamp'] = $timestamp;

        return $self;
    }
}
