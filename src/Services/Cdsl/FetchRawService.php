<?php

declare(strict_types=1);

namespace CasParser\Services\Cdsl;

use CasParser\Cdsl\Fetch\FetchRequestOtpParams;
use CasParser\Cdsl\Fetch\FetchRequestOtpResponse;
use CasParser\Cdsl\Fetch\FetchVerifyOtpParams;
use CasParser\Cdsl\Fetch\FetchVerifyOtpResponse;
use CasParser\Client;
use CasParser\Core\Contracts\BaseResponse;
use CasParser\Core\Exceptions\APIException;
use CasParser\RequestOptions;
use CasParser\ServiceContracts\Cdsl\FetchRawContract;

/**
 * @phpstan-import-type RequestOpts from \CasParser\RequestOptions
 */
final class FetchRawService implements FetchRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

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
     * @param array{
     *   boID: string, dob: string, pan: string
     * }|FetchRequestOtpParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FetchRequestOtpResponse>
     *
     * @throws APIException
     */
    public function requestOtp(
        array|FetchRequestOtpParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FetchRequestOtpParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'v4/cdsl/fetch',
            body: (object) $parsed,
            options: $options,
            convert: FetchRequestOtpResponse::class,
        );
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
     * @param array{otp: string, numPeriods?: int}|FetchVerifyOtpParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FetchVerifyOtpResponse>
     *
     * @throws APIException
     */
    public function verifyOtp(
        string $sessionID,
        array|FetchVerifyOtpParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FetchVerifyOtpParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['v4/cdsl/fetch/%1$s/verify', $sessionID],
            body: (object) $parsed,
            options: $options,
            convert: FetchVerifyOtpResponse::class,
        );
    }
}
