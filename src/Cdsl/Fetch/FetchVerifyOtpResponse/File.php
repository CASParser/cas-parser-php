<?php

declare(strict_types=1);

namespace CasParser\Cdsl\Fetch\FetchVerifyOtpResponse;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type FileShape = array{filename?: string|null, url?: string|null}
 */
final class File implements BaseModel
{
    /** @use SdkModel<FileShape> */
    use SdkModel;

    #[Optional]
    public ?string $filename;

    /**
     * Direct download URL (cloud storage).
     */
    #[Optional]
    public ?string $url;

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
        ?string $filename = null,
        ?string $url = null
    ): self {
        $self = new self;

        null !== $filename && $self['filename'] = $filename;
        null !== $url && $self['url'] = $url;

        return $self;
    }

    public function withFilename(string $filename): self
    {
        $self = clone $this;
        $self['filename'] = $filename;

        return $self;
    }

    /**
     * Direct download URL (cloud storage).
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
