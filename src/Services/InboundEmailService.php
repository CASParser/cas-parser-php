<?php

declare(strict_types=1);

namespace CasParser\Services;

use CasParser\Client;
use CasParser\Core\Exceptions\APIException;
use CasParser\Core\Util;
use CasParser\InboundEmail\InboundEmailCreateParams\AllowedSource;
use CasParser\InboundEmail\InboundEmailDeleteResponse;
use CasParser\InboundEmail\InboundEmailGetResponse;
use CasParser\InboundEmail\InboundEmailListParams\Status;
use CasParser\InboundEmail\InboundEmailListResponse;
use CasParser\InboundEmail\InboundEmailNewResponse;
use CasParser\RequestOptions;
use CasParser\ServiceContracts\InboundEmailContract;

/**
 * Create dedicated inbound email addresses for investors to forward their CAS statements.
 *
 * **Use Case:** Your app wants to collect CAS statements from users without requiring OAuth or file upload.
 *
 * **How it works:**
 * 1. Call `POST /v4/inbound-email` to create a unique inbound email address
 * 2. Display this email to your user: "Forward your CAS statement to ie_xxx@import.casparser.in"
 * 3. When user forwards a CAS email, we verify sender authenticity (SPF/DKIM) and call your webhook
 * 4. Your webhook receives email metadata + attachment download URLs
 *
 * **Sender Validation:**
 * - Only emails from verified CAS authorities are processed:
 *   - CDSL: `eCAS@cdslstatement.com`
 *   - NSDL: `NSDL-CAS@nsdl.co.in`
 *   - CAMS: `donotreply@camsonline.com`
 *   - KFintech: `samfS@kfintech.com`
 * - Emails failing SPF/DKIM/DMARC are rejected
 * - Forwarded emails must contain the original sender in headers
 *
 * **Billing:** 0.2 credits per successfully processed valid email
 *
 * @phpstan-import-type RequestOpts from \CasParser\RequestOptions
 */
final class InboundEmailService implements InboundEmailContract
{
    /**
     * @api
     */
    public InboundEmailRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new InboundEmailRawService($client);
    }

    /**
     * @api
     *
     * Create a dedicated inbound email address for collecting CAS statements
     * via email forwarding. When an investor forwards a CAS email to this
     * address, we verify the sender and make the file available to you.
     *
     * `callback_url` is **optional**:
     * - **Set it** — we POST each parsed email to your webhook as it arrives.
     * - **Omit it** — retrieve files via `GET /v4/inbound-email/{id}/files`
     *   without building a webhook consumer.
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
    ): InboundEmailNewResponse {
        $params = Util::removeNulls(
            [
                'alias' => $alias,
                'allowedSources' => $allowedSources,
                'callbackURL' => $callbackURL,
                'metadata' => $metadata,
                'reference' => $reference,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve details of a specific mailbox including statistics.
     *
     * @param string $inboundEmailID Inbound Email ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $inboundEmailID,
        RequestOptions|array|null $requestOptions = null
    ): InboundEmailGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($inboundEmailID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List all mailboxes associated with your API key.
     * Returns active and inactive mailboxes (deleted mailboxes are excluded).
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
    ): InboundEmailListResponse {
        $params = Util::removeNulls(
            ['limit' => $limit, 'offset' => $offset, 'status' => $status]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Permanently delete an inbound email address. It will stop accepting emails.
     *
     * **Note:** Deletion is immediate and cannot be undone. Any emails received after
     * deletion will be rejected.
     *
     * @param string $inboundEmailID Inbound Email ID to delete
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $inboundEmailID,
        RequestOptions|array|null $requestOptions = null
    ): InboundEmailDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($inboundEmailID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
