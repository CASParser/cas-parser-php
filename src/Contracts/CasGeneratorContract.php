<?php

declare(strict_types=1);

namespace CasParser\Contracts;

use CasParser\CasGenerator\CasGeneratorGenerateCasParams;
use CasParser\CasGenerator\CasGeneratorGenerateCasParams\CasAuthority;
use CasParser\RequestOptions;
use CasParser\Responses\CasGenerator\CasGeneratorGenerateCasResponse;

interface CasGeneratorContract
{
    /**
     * @param array{
     *   email: string,
     *   fromDate: string,
     *   password: string,
     *   toDate: string,
     *   casAuthority?: CasAuthority::*,
     *   panNo?: string,
     * }|CasGeneratorGenerateCasParams $params
     */
    public function generateCas(
        array|CasGeneratorGenerateCasParams $params,
        ?RequestOptions $requestOptions = null,
    ): CasGeneratorGenerateCasResponse;
}
