<?php

declare(strict_types=1);

namespace CasParser\ServiceContracts\Cdsl;

use CasParser\Cdsl\Fetch\FetchRequestOtpResponse;
use CasParser\Cdsl\Fetch\FetchVerifyOtpResponse;
use CasParser\Core\Exceptions\APIException;
use CasParser\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \CasParser\RequestOptions
 */
interface FetchContract
{
    /**
     * @api
     *
     * @param string $boID CDSL BO ID (16 digits)
     * @param string $dob Date of birth (YYYY-MM-DD)
     * @param string $pan PAN number
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function requestOtp(
        string $boID,
        string $dob,
        string $pan,
        RequestOptions|array|null $requestOptions = null,
    ): FetchRequestOtpResponse;

    /**
     * @api
     *
     * @param string $sessionID Session ID from Step 1
     * @param string $otp OTP received on mobile
     * @param int $numPeriods Number of monthly statements to fetch (default 6)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function verifyOtp(
        string $sessionID,
        string $otp,
        int $numPeriods = 6,
        RequestOptions|array|null $requestOptions = null,
    ): FetchVerifyOtpResponse;
}
