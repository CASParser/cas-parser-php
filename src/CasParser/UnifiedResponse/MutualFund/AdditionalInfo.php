<?php

declare(strict_types=1);

namespace CasParser\CasParser\UnifiedResponse\MutualFund;

use CasParser\Core\Attributes\Api;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;

/**
 * Additional folio information.
 *
 * @phpstan-type additional_info = array{
 *   kyc?: string|null, pan?: string|null, pankyc?: string|null
 * }
 */
final class AdditionalInfo implements BaseModel
{
    /** @use SdkModel<additional_info> */
    use SdkModel;

    /**
     * KYC status of the folio.
     */
    #[Api(optional: true)]
    public ?string $kyc;

    /**
     * PAN associated with the folio.
     */
    #[Api(optional: true)]
    public ?string $pan;

    /**
     * PAN KYC status.
     */
    #[Api(optional: true)]
    public ?string $pankyc;

    public function __construct()
    {
        self::introspect();
        $this->unsetOptionalProperties();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $kyc = null,
        ?string $pan = null,
        ?string $pankyc = null
    ): self {
        $obj = new self;

        null !== $kyc && $obj->kyc = $kyc;
        null !== $pan && $obj->pan = $pan;
        null !== $pankyc && $obj->pankyc = $pankyc;

        return $obj;
    }

    /**
     * KYC status of the folio.
     */
    public function withKYC(string $kyc): self
    {
        $obj = clone $this;
        $obj->kyc = $kyc;

        return $obj;
    }

    /**
     * PAN associated with the folio.
     */
    public function withPan(string $pan): self
    {
        $obj = clone $this;
        $obj->pan = $pan;

        return $obj;
    }

    /**
     * PAN KYC status.
     */
    public function withPankyc(string $pankyc): self
    {
        $obj = clone $this;
        $obj->pankyc = $pankyc;

        return $obj;
    }
}
