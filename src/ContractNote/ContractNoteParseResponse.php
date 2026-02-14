<?php

declare(strict_types=1);

namespace CasParser\ContractNote;

use CasParser\ContractNote\ContractNoteParseResponse\Data;
use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type DataShape from \CasParser\ContractNote\ContractNoteParseResponse\Data
 *
 * @phpstan-type ContractNoteParseResponseShape = array{
 *   data?: null|Data|DataShape, msg?: string|null, status?: string|null
 * }
 */
final class ContractNoteParseResponse implements BaseModel
{
    /** @use SdkModel<ContractNoteParseResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Data $data;

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
     * @param Data|DataShape|null $data
     */
    public static function with(
        Data|array|null $data = null,
        ?string $msg = null,
        ?string $status = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $msg && $self['msg'] = $msg;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    /**
     * @param Data|DataShape $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

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
