<?php

declare(strict_types=1);

namespace CasParser\Kfintech;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type KfintechGenerateCasResponseShape = array{
 *   msg?: string|null, status?: string|null
 * }
 */
final class KfintechGenerateCasResponse implements BaseModel
{
    /** @use SdkModel<KfintechGenerateCasResponseShape> */
    use SdkModel;

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
     */
    public static function with(?string $msg = null, ?string $status = null): self
    {
        $self = new self;

        null !== $msg && $self['msg'] = $msg;
        null !== $status && $self['status'] = $status;

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
