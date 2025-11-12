<?php

declare(strict_types=1);

namespace CasParser\ServiceContracts;

use CasParser\CasGenerator\CasGeneratorGenerateCasParams;
use CasParser\CasGenerator\CasGeneratorGenerateCasResponse;
use CasParser\Core\Exceptions\APIException;
use CasParser\RequestOptions;

interface CasGeneratorContract
{
    /**
     * @api
     *
     * @param array<mixed>|CasGeneratorGenerateCasParams $params
     *
     * @throws APIException
     */
    public function generateCas(
        array|CasGeneratorGenerateCasParams $params,
        ?RequestOptions $requestOptions = null,
    ): CasGeneratorGenerateCasResponse;
}
