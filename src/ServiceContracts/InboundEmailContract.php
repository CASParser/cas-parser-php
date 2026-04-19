<?php

declare(strict_types=1);

namespace CasParser\ServiceContracts;

use CasParser\Core\Exceptions\APIException;
use CasParser\InboundEmail\InboundEmailCreateParams\AllowedSource;
use CasParser\InboundEmail\InboundEmailDeleteResponse;
use CasParser\InboundEmail\InboundEmailGetResponse;
use CasParser\InboundEmail\InboundEmailListParams\Status;
use CasParser\InboundEmail\InboundEmailListResponse;
use CasParser\InboundEmail\InboundEmailNewResponse;
use CasParser\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \CasParser\RequestOptions
 */
interface InboundEmailContract
{
    /**
     * @api
     *
     * @param string $alias Optional custom email prefix (e.g.
     * `john-portfolio@import.casparser.in`). 3-32 chars,
     * alphanumeric + hyphens, must start/end with a letter or
     * number. If omitted, a random ID is generated.
     * @param list<AllowedSource|value-of<AllowedSource>> $allowedSources Filter emails by CAS provider. If omitted, accepts all providers.
     * - `cdsl` → eCAS@cdslstatement.com
     * - `nsdl` → NSDL-CAS@nsdl.co.in
     * - `cams` → donotreply@camsonline.com
     * - `kfintech` → samfS@kfintech.com
     * @param string|null $callbackURL Optional webhook URL where we POST parsed emails. Must be
     * HTTPS in production (HTTP allowed for localhost). If omitted,
     * retrieve files via `GET /v4/inbound-email/{id}/files`.
     * @param array<string,string> $metadata Optional key-value pairs (max 10) to include in webhook payload.
     * Useful for passing context like plan_type, campaign_id, etc.
     * @param string $reference Your internal identifier (e.g., user_id, account_id).
     * Returned in webhook payload for correlation.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        ?string $alias = null,
        ?array $allowedSources = null,
        ?string $callbackURL = null,
        ?array $metadata = null,
        ?string $reference = null,
        RequestOptions|array|null $requestOptions = null,
    ): InboundEmailNewResponse;

    /**
     * @api
     *
     * @param string $inboundEmailID Inbound Email ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $inboundEmailID,
        RequestOptions|array|null $requestOptions = null
    ): InboundEmailGetResponse;

    /**
     * @api
     *
     * @param int $limit Maximum number of inbound emails to return
     * @param int $offset Pagination offset
     * @param Status|value-of<Status> $status Filter by status
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        int $limit = 50,
        int $offset = 0,
        Status|string $status = 'all',
        RequestOptions|array|null $requestOptions = null,
    ): InboundEmailListResponse;

    /**
     * @api
     *
     * @param string $inboundEmailID Inbound Email ID to delete
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $inboundEmailID,
        RequestOptions|array|null $requestOptions = null
    ): InboundEmailDeleteResponse;
}
