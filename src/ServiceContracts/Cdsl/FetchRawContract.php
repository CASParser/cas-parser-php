<?php

declare(strict_types=1);

namespace CasParser\ServiceContracts\Cdsl;

use CasParser\Cdsl\Fetch\FetchRequestOtpParams;
use CasParser\Cdsl\Fetch\FetchRequestOtpResponse;
use CasParser\Cdsl\Fetch\FetchVerifyOtpParams;
use CasParser\Cdsl\Fetch\FetchVerifyOtpResponse;
use CasParser\Core\Contracts\BaseResponse;
use CasParser\Core\Exceptions\APIException;
use CasParser\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \CasParser\RequestOptions
 */
interface FetchRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|FetchRequestOtpParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FetchRequestOtpResponse>
     *
     * @throws APIException
     */
    public function requestOtp(
        array|FetchRequestOtpParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $sessionID Session ID from Step 1
     * @param array<string,mixed>|FetchVerifyOtpParams $params
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
    ): BaseResponse;
}
