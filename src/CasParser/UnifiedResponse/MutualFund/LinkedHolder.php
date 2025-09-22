<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse\MutualFund;

use CasParser\Core\Attributes\Api;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * @phpstan-type linked_holder = array{name?: string, pan?: string}
 */
final class LinkedHolder implements BaseModel
{
    /** @use SdkModel<linked_holder> */
    use SdkModel;

    /**
     * Name of the account holder.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * PAN of the account holder.
     */
    #[Api(optional: true)]
    public ?string $pan;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $name = null, ?string $pan = null): self
    {
        $obj = new self;

        null !== $name && $obj->name = $name;
        null !== $pan && $obj->pan = $pan;

        return $obj;
    }

    /**
     * Name of the account holder.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * PAN of the account holder.
     */
    public function withPan(string $pan): self
    {
        $obj = clone $this;
        $obj->pan = $pan;

        return $obj;
    }
}
