<?php

declare(strict_types=1);

namespace CasParser\Services;

use CasParser\Client;
use CasParser\Core\Exceptions\APIException;
use CasParser\Core\Util;
use CasParser\Kfintech\KfintechGenerateCasResponse;
use CasParser\RequestOptions;
use CasParser\ServiceContracts\KfintechContract;

/**
 * @phpstan-import-type RequestOpts from \CasParser\RequestOptions
 */
final class KfintechService implements KfintechContract
{
    /**
     * @api
     */
    public KfintechRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new KfintechRawService($client);
    }

    /**
     * @api
     *
     * Generate CAS via KFintech mailback. The CAS PDF will be sent to the investor's email.
     *
     * This is an async operation - the investor receives the CAS via email within a few minutes.
     * For instant CAS retrieval, use CDSL Fetch (`/v4/cdsl/fetch`).
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
    ): KfintechGenerateCasResponse {
        $params = Util::removeNulls(
            [
                'email' => $email,
                'fromDate' => $fromDate,
                'password' => $password,
                'toDate' => $toDate,
                'panNo' => $panNo,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->generateCas(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
