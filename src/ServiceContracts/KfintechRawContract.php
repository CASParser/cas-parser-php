<?php

declare(strict_types=1);

namespace CasParser\ServiceContracts;

use CasParser\Core\Contracts\BaseResponse;
use CasParser\Core\Exceptions\APIException;
use CasParser\Kfintech\KfintechGenerateCasParams;
use CasParser\Kfintech\KfintechGenerateCasResponse;
use CasParser\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \CasParser\RequestOptions
 */
interface KfintechRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|KfintechGenerateCasParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<KfintechGenerateCasResponse>
     *
     * @throws APIException
     */
    public function generateCas(
        array|KfintechGenerateCasParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
