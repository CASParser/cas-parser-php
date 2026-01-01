<?php

declare(strict_types=1);

namespace CasParser\Services;

use CasParser\CasGenerator\CasGeneratorGenerateCasParams\CasAuthority;
use CasParser\CasGenerator\CasGeneratorGenerateCasResponse;
use CasParser\Client;
use CasParser\Core\Exceptions\APIException;
use CasParser\Core\Util;
use CasParser\RequestOptions;
use CasParser\ServiceContracts\CasGeneratorContract;

final class CasGeneratorService implements CasGeneratorContract
{
    /**
     * @api
     */
    public CasGeneratorRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CasGeneratorRawService($client);
    }

    /**
     * @api
     *
     * This endpoint generates CAS (Consolidated Account Statement) documents by submitting a mailback request to the specified CAS authority.
     * Currently only supports KFintech, with plans to support CAMS, CDSL, and NSDL in the future.
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
    ): CasGeneratorGenerateCasResponse {
        $params = Util::removeNulls(
            [
                'email' => $email,
                'fromDate' => $fromDate,
                'password' => $password,
                'toDate' => $toDate,
                'casAuthority' => $casAuthority,
                'panNo' => $panNo,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->generateCas(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
