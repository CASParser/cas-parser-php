<?php

declare(strict_types=1);

namespace CasParser\ServiceContracts;

use CasParser\Core\Exceptions\APIException;
use CasParser\Kfintech\KfintechGenerateCasResponse;
use CasParser\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \CasParser\RequestOptions
 */
interface KfintechContract
{
    /**
     * @api
     *
     * @param string $email Email address to receive the CAS document
     * @param string $fromDate Start date (YYYY-MM-DD)
     * @param string $password Password for the PDF
     * @param string $toDate End date (YYYY-MM-DD)
     * @param string $panNo PAN number (optional)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function generateCas(
        string $email,
        string $fromDate,
        string $password,
        string $toDate,
        ?string $panNo = null,
        RequestOptions|array|null $requestOptions = null,
    ): KfintechGenerateCasResponse;
}
