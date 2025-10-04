<?php

declare(strict_types=1);

namespace CasParser\ServiceContracts;

use CasParser\CasGenerator\CasGeneratorGenerateCasParams\CasAuthority;
use CasParser\CasGenerator\CasGeneratorGenerateCasResponse;
use CasParser\Core\Exceptions\APIException;
use CasParser\RequestOptions;

use const CasParser\Core\OMIT as omit;

interface CasGeneratorContract
{
    /**
     * @api
     *
     * @param string $email Email address to receive the CAS document
     * @param string $fromDate Start date for the CAS period (format YYYY-MM-DD)
     * @param string $password Password to protect the generated CAS PDF
     * @param string $toDate End date for the CAS period (format YYYY-MM-DD)
     * @param CasAuthority|value-of<CasAuthority> $casAuthority CAS authority to generate the document from (currently only kfintech is supported)
     * @param string $panNo PAN number (optional for some CAS authorities)
     *
     * @throws APIException
     */
    public function generateCas(
        $email,
        $fromDate,
        $password,
        $toDate,
        $casAuthority = omit,
        $panNo = omit,
        ?RequestOptions $requestOptions = null,
    ): CasGeneratorGenerateCasResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function generateCasRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CasGeneratorGenerateCasResponse;
}
