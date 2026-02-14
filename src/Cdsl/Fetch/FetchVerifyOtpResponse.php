<?php

declare(strict_types=1);

namespace CasParser\Cdsl\Fetch;

use CasParser\Cdsl\Fetch\FetchVerifyOtpResponse\File;
use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type FileShape from \CasParser\Cdsl\Fetch\FetchVerifyOtpResponse\File
 *
 * @phpstan-type FetchVerifyOtpResponseShape = array{
 *   files?: list<File|FileShape>|null, msg?: string|null, status?: string|null
 * }
 */
final class FetchVerifyOtpResponse implements BaseModel
{
    /** @use SdkModel<FetchVerifyOtpResponseShape> */
    use SdkModel;

    /** @var list<File>|null $files */
    #[Optional(list: File::class)]
    public ?array $files;

    #[Optional]
    public ?string $msg;

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
        ?array $files = null,
        ?string $msg = null,
        ?string $status = null
    ): self {
        $self = new self;

        null !== $files && $self['files'] = $files;
        null !== $msg && $self['msg'] = $msg;
        null !== $status && $self['status'] = $status;

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

    public function withMsg(string $msg): self
    {
        $self = clone $this;
        $self['msg'] = $msg;

        return $self;
    }

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
