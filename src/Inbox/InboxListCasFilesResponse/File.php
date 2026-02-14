<?php

declare(strict_types=1);

namespace CasParser\Inbox\InboxListCasFilesResponse;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;
use CasParser\Inbox\InboxListCasFilesResponse\File\CasType;

/**
 * A CAS file found in the user's email inbox.
 *
 * @phpstan-type FileShape = array{
 *   casType?: null|CasType|value-of<CasType>,
 *   expiresIn?: int|null,
 *   filename?: string|null,
 *   messageDate?: string|null,
 *   messageID?: string|null,
 *   originalFilename?: string|null,
 *   size?: int|null,
 *   url?: string|null,
 * }
 */
final class File implements BaseModel
{
    /** @use SdkModel<FileShape> */
    use SdkModel;

    /**
     * Detected CAS provider based on sender email.
     *
     * @var value-of<CasType>|null $casType
     */
    #[Optional('cas_type', enum: CasType::class)]
    public ?string $casType;

    /**
     * URL expiration time in seconds (default 86400 = 24 hours).
     */
    #[Optional('expires_in')]
    public ?int $expiresIn;

    /**
     * Standardized filename (provider_YYYYMMDD_uniqueid.pdf).
     */
    #[Optional]
    public ?string $filename;

    /**
     * Date the email was received.
     */
    #[Optional('message_date')]
    public ?string $messageDate;

    /**
     * Unique identifier for the email message (use for subsequent API calls).
     */
    #[Optional('message_id')]
    public ?string $messageID;

    /**
     * Original attachment filename from the email.
     */
    #[Optional('original_filename')]
    public ?string $originalFilename;

    /**
     * File size in bytes.
     */
    #[Optional]
    public ?int $size;

    /**
     * Direct download URL (presigned, expires based on expires_in).
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
     *
     * @param CasType|value-of<CasType>|null $casType
     */
    public static function with(
        CasType|string|null $casType = null,
        ?int $expiresIn = null,
        ?string $filename = null,
        ?string $messageDate = null,
        ?string $messageID = null,
        ?string $originalFilename = null,
        ?int $size = null,
        ?string $url = null,
    ): self {
        $self = new self;

        null !== $casType && $self['casType'] = $casType;
        null !== $expiresIn && $self['expiresIn'] = $expiresIn;
        null !== $filename && $self['filename'] = $filename;
        null !== $messageDate && $self['messageDate'] = $messageDate;
        null !== $messageID && $self['messageID'] = $messageID;
        null !== $originalFilename && $self['originalFilename'] = $originalFilename;
        null !== $size && $self['size'] = $size;
        null !== $url && $self['url'] = $url;

        return $self;
    }

    /**
     * Detected CAS provider based on sender email.
     *
     * @param CasType|value-of<CasType> $casType
     */
    public function withCasType(CasType|string $casType): self
    {
        $self = clone $this;
        $self['casType'] = $casType;

        return $self;
    }

    /**
     * URL expiration time in seconds (default 86400 = 24 hours).
     */
    public function withExpiresIn(int $expiresIn): self
    {
        $self = clone $this;
        $self['expiresIn'] = $expiresIn;

        return $self;
    }

    /**
     * Standardized filename (provider_YYYYMMDD_uniqueid.pdf).
     */
    public function withFilename(string $filename): self
    {
        $self = clone $this;
        $self['filename'] = $filename;

        return $self;
    }

    /**
     * Date the email was received.
     */
    public function withMessageDate(string $messageDate): self
    {
        $self = clone $this;
        $self['messageDate'] = $messageDate;

        return $self;
    }

    /**
     * Unique identifier for the email message (use for subsequent API calls).
     */
    public function withMessageID(string $messageID): self
    {
        $self = clone $this;
        $self['messageID'] = $messageID;

        return $self;
    }

    /**
     * Original attachment filename from the email.
     */
    public function withOriginalFilename(string $originalFilename): self
    {
        $self = clone $this;
        $self['originalFilename'] = $originalFilename;

        return $self;
    }

    /**
     * File size in bytes.
     */
    public function withSize(int $size): self
    {
        $self = clone $this;
        $self['size'] = $size;

        return $self;
    }

    /**
     * Direct download URL (presigned, expires based on expires_in).
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
