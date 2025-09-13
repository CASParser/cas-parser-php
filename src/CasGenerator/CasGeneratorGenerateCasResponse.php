<?php

declare(strict_types=1);

namespace CasParser\CasGenerator;

use CasParser\Core\Attributes\Api;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type cas_generator_generate_cas_response = array{
 *   msg?: string, status?: string
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class CasGeneratorGenerateCasResponse implements BaseModel
{
    /** @use SdkModel<cas_generator_generate_cas_response> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $msg;

    #[Api(optional: true)]
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
        $obj = new self;

        null !== $msg && $obj->msg = $msg;
        null !== $status && $obj->status = $status;

        return $obj;
    }

    public function withMsg(string $msg): self
    {
        $obj = clone $this;
        $obj->msg = $msg;

        return $obj;
    }

    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }
}
