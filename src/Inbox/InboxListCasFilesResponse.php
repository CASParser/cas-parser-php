<?php

declare(strict_types=1);

namespace CasParser\Inbox;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;
use CasParser\Inbox\InboxListCasFilesResponse\File;

/**
 * @phpstan-import-type FileShape from \CasParser\Inbox\InboxListCasFilesResponse\File
 *
 * @phpstan-type InboxListCasFilesResponseShape = array{
 *   count?: int|null, files?: list<File|FileShape>|null, status?: string|null
 * }
 */
final class InboxListCasFilesResponse implements BaseModel
{
    /** @use SdkModel<InboxListCasFilesResponseShape> */
    use SdkModel;

    /**
     * Number of CAS files found.
     */
    #[Optional]
    public ?int $count;

    /** @var list<File>|null $files */
    #[Optional(list: File::class)]
    public ?array $files;

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
     *
     * @param list<File|FileShape>|null $files
     */
    public static function with(
        ?int $count = null,
        ?array $files = null,
        ?string $status = null
    ): self {
        $self = new self;

        null !== $count && $self['count'] = $count;
        null !== $files && $self['files'] = $files;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    /**
     * Number of CAS files found.
     */
    public function withCount(int $count): self
    {
        $self = clone $this;
        $self['count'] = $count;

        return $self;
    }

    /**
     * @param list<File|FileShape> $files
     */
    public function withFiles(array $files): self
    {
        $self = clone $this;
        $self['files'] = $files;

        return $self;
    }

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
