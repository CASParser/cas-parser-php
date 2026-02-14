<?php

declare(strict_types=1);

namespace CasParser\Services\Cdsl;

use CasParser\Cdsl\Fetch\FetchRequestOtpResponse;
use CasParser\Cdsl\Fetch\FetchVerifyOtpResponse;
use CasParser\Client;
use CasParser\Core\Exceptions\APIException;
use CasParser\Core\Util;
use CasParser\RequestOptions;
use CasParser\ServiceContracts\Cdsl\FetchContract;

/**
 * @phpstan-import-type RequestOpts from \CasParser\RequestOptions
 */
final class FetchService implements FetchContract
{
    /**
     * @api
     */
    public FetchRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new FetchRawService($client);
    }

    /**
     * @api
     *
     * **Step 1 of 2**: Request OTP for CDSL CAS fetch.
     *
     * This endpoint:
     * 1. Solves reCAPTCHA automatically (~15-20 seconds)
     * 2. Submits login credentials to CDSL portal
     * 3. Triggers OTP to user's registered mobile number
     *
     * After user receives OTP, call `/v4/cdsl/fetch/{session_id}/verify` to complete.
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
    ): FetchRequestOtpResponse {
        $params = Util::removeNulls(
            ['boID' => $boID, 'dob' => $dob, 'pan' => $pan]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->requestOtp(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * **Step 2 of 2**: Verify OTP and retrieve CDSL CAS files.
     *
     * After successful verification, CAS PDFs are fetched from CDSL portal,
     * uploaded to cloud storage, and returned as direct download URLs.
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
    ): FetchVerifyOtpResponse {
        $params = Util::removeNulls(['otp' => $otp, 'numPeriods' => $numPeriods]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->verifyOtp($sessionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
