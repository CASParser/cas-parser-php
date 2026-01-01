<?php

declare(strict_types=1);

namespace CasParser\ServiceContracts;

use CasParser\CasGenerator\CasGeneratorGenerateCasParams;
use CasParser\CasGenerator\CasGeneratorGenerateCasResponse;
use CasParser\Core\Contracts\BaseResponse;
use CasParser\Core\Exceptions\APIException;
use CasParser\RequestOptions;

interface CasGeneratorRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|CasGeneratorGenerateCasParams $params
     *
     * @return BaseResponse<CasGeneratorGenerateCasResponse>
     *
     * @throws APIException
     */
    public function generateCas(
        array|CasGeneratorGenerateCasParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
