<?php

declare(strict_types=1);

namespace CasParser\Cdsl\Fetch;

use CasParser\Core\Attributes\Required;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Concerns\SdkParams;
use CasParser\Core\Contracts\BaseModel;

/**
 * **Step 1 of 2**: Request OTP for CDSL CAS fetch.
 *
 * This endpoint:
 * 1. Solves reCAPTCHA automatically (~15-20 seconds)
 * 2. Submits login credentials to CDSL portal
 * 3. Triggers OTP to user's registered mobile number
 *
 * After user receives OTP, call `/v4/cdsl/fetch/{session_id}/verify` to complete.
 *
 * @see CasParser\Services\Cdsl\FetchService::requestOtp()
 *
 * @phpstan-type FetchRequestOtpParamsShape = array{
 *   boID: string, dob: string, pan: string
 * }
 */
final class FetchRequestOtpParams implements BaseModel
{
    /** @use SdkModel<FetchRequestOtpParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * CDSL BO ID (16 digits).
     */
    #[Required('bo_id')]
    public string $boID;

    /**
     * Date of birth (YYYY-MM-DD).
     */
    #[Required]
    public string $dob;

    /**
     * PAN number.
     */
    #[Required]
    public string $pan;

    /**
     * `new FetchRequestOtpParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FetchRequestOtpParams::with(boID: ..., dob: ..., pan: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FetchRequestOtpParams)->withBoID(...)->withDob(...)->withPan(...)
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
    public static function with(string $boID, string $dob, string $pan): self
    {
        $self = new self;

        $self['boID'] = $boID;
        $self['dob'] = $dob;
        $self['pan'] = $pan;

        return $self;
    }

    /**
     * CDSL BO ID (16 digits).
     */
    public function withBoID(string $boID): self
    {
        $self = clone $this;
        $self['boID'] = $boID;

        return $self;
    }

    /**
     * Date of birth (YYYY-MM-DD).
     */
    public function withDob(string $dob): self
    {
        $self = clone $this;
        $self['dob'] = $dob;

        return $self;
    }

    /**
     * PAN number.
     */
    public function withPan(string $pan): self
    {
        $self = clone $this;
        $self['pan'] = $pan;

        return $self;
    }
}
