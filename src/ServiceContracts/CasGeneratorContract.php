<?php

declare(strict_types=1);

namespace CasParser\ServiceContracts;

use CasParser\CasGenerator\CasGeneratorGenerateCasParams\CasAuthority;
use CasParser\CasGenerator\CasGeneratorGenerateCasResponse;
use CasParser\Core\Exceptions\APIException;
use CasParser\RequestOptions;

interface CasGeneratorContract
{
    /**
     * @api
     *
     * @param string $email Email address to receive the CAS document
     * @param string $fromDate Start date for the CAS period (format YYYY-MM-DD)
     * @param string $password Password to protect the generated CAS PDF
     * @param string $toDate End date for the CAS period (format YYYY-MM-DD)
     * @param 'kfintech'|'cams'|'cdsl'|'nsdl'|CasAuthority $casAuthority CAS authority to generate the document from (currently only kfintech is supported)
     * @param string $panNo PAN number (optional for some CAS authorities)
     *
     * @throws APIException
     */
    public function generateCas(
        string $email,
        string $fromDate,
        string $password,
        string $toDate,
        string|CasAuthority $casAuthority = 'kfintech',
        ?string $panNo = null,
        ?RequestOptions $requestOptions = null,
    ): CasGeneratorGenerateCasResponse;
}
