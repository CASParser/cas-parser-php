<?php

declare(strict_types=1);

namespace CasParser\Cdsl\Fetch;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Attributes\Required;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Concerns\SdkParams;
use CasParser\Core\Contracts\BaseModel;

/**
 * **Step 2 of 2**: Verify OTP and retrieve CDSL CAS files.
 *
 * After successful verification, CAS PDFs are fetched from CDSL portal,
 * uploaded to cloud storage, and returned as direct download URLs.
 *
 * @see CasParser\Services\Cdsl\FetchService::verifyOtp()
 *
 * @phpstan-type FetchVerifyOtpParamsShape = array{
 *   otp: string, numPeriods?: int|null
 * }
 */
final class FetchVerifyOtpParams implements BaseModel
{
    /** @use SdkModel<FetchVerifyOtpParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * OTP received on mobile.
     */
    #[Required]
    public string $otp;

    /**
     * Number of monthly statements to fetch (default 6).
     */
    #[Optional('num_periods')]
    public ?int $numPeriods;

    /**
     * `new FetchVerifyOtpParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FetchVerifyOtpParams::with(otp: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FetchVerifyOtpParams)->withOtp(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $otp, ?int $numPeriods = null): self
    {
        $self = new self;

        $self['otp'] = $otp;

        null !== $numPeriods && $self['numPeriods'] = $numPeriods;

        return $self;
    }

    /**
     * OTP received on mobile.
     */
    public function withOtp(string $otp): self
    {
        $self = clone $this;
        $self['otp'] = $otp;

        return $self;
    }

    /**
     * Number of monthly statements to fetch (default 6).
     */
    public function withNumPeriods(int $numPeriods): self
    {
        $self = clone $this;
        $self['numPeriods'] = $numPeriods;

        return $self;
    }
}
