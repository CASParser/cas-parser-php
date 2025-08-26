<?php

declare(strict_types=1);

namespace CasParser\Contracts;

use CasParser\CasGenerator\CasGeneratorGenerateCasParams\CasAuthority;
use CasParser\RequestOptions;
use CasParser\Responses\CasGenerator\CasGeneratorGenerateCasResponse;

use const CasParser\Core\OMIT as omit;

interface CasGeneratorContract
{
    /**
     * @param string $email Email address to receive the CAS document
     * @param string $fromDate Start date for the CAS period (format YYYY-MM-DD)
     * @param string $password Password to protect the generated CAS PDF
     * @param string $toDate End date for the CAS period (format YYYY-MM-DD)
     * @param CasAuthority::* $casAuthority CAS authority to generate the document from (currently only kfintech is supported)
     * @param string $panNo PAN number (optional for some CAS authorities)
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
}
