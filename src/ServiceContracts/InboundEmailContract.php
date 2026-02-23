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
     * @param string $callbackURL Webhook URL where we POST email notifications.
     * Must be HTTPS in production (HTTP allowed for localhost during development).
     * @param string $alias Optional custom email prefix for user-friendly addresses.
     * - Must be 3-32 characters
     * - Alphanumeric + hyphens only
     * - Must start and end with letter/number
     * - Example: `john-portfolio@import.casparser.in`
     * - If omitted, generates random ID like `ie_abc123xyz@import.casparser.in`
     * @param list<AllowedSource|value-of<AllowedSource>> $allowedSources Filter emails by CAS provider. If omitted, accepts all providers.
     * - `cdsl` → eCAS@cdslstatement.com
     * - `nsdl` → NSDL-CAS@nsdl.co.in
     * - `cams` → donotreply@camsonline.com
     * - `kfintech` → samfS@kfintech.com
     * @param array<string,string> $metadata Optional key-value pairs (max 10) to include in webhook payload.
     * Useful for passing context like plan_type, campaign_id, etc.
     * @param string $reference Your internal identifier (e.g., user_id, account_id).
     * Returned in webhook payload for correlation.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $callbackURL,
        ?string $alias = null,
        ?array $allowedSources = null,
        ?array $metadata = null,
        ?string $reference = null,
        RequestOptions|array|null $requestOptions = null,
    ): InboundEmailNewResponse;

    /**
     * @api
     *
     * @param string $inboundEmailID Inbound Email ID (e.g., ie_a1b2c3d4e5f6)
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
