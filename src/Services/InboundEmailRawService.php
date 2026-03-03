<?php

declare(strict_types=1);

namespace CasParser\Services;

use CasParser\Client;
use CasParser\Core\Contracts\BaseResponse;
use CasParser\Core\Exceptions\APIException;
use CasParser\InboundEmail\InboundEmailCreateParams;
use CasParser\InboundEmail\InboundEmailCreateParams\AllowedSource;
use CasParser\InboundEmail\InboundEmailDeleteResponse;
use CasParser\InboundEmail\InboundEmailGetResponse;
use CasParser\InboundEmail\InboundEmailListParams;
use CasParser\InboundEmail\InboundEmailListParams\Status;
use CasParser\InboundEmail\InboundEmailListResponse;
use CasParser\InboundEmail\InboundEmailNewResponse;
use CasParser\RequestOptions;
use CasParser\ServiceContracts\InboundEmailRawContract;

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
final class InboundEmailRawService implements InboundEmailRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a dedicated inbound email address for collecting CAS statements via email forwarding.
     *
     * **How it works:**
     * 1. Create an inbound email with your webhook URL
     * 2. Display the email address to your user (e.g., "Forward your CAS to ie_xxx@import.casparser.in")
     * 3. When an investor forwards a CAS email, we verify the sender and deliver to your webhook
     *
     * **Webhook Delivery:**
     * - We POST to your `callback_url` with JSON body containing files (matching EmailCASFile schema)
     * - Failed deliveries are retried automatically with exponential backoff
     *
     * **Inactivity:**
     * - Inbound emails with no activity in 30 days are marked inactive
     * - Active inbound emails remain operational indefinitely
     *
     * @param array{
     *   callbackURL: string,
     *   alias?: string,
     *   allowedSources?: list<AllowedSource|value-of<AllowedSource>>,
     *   metadata?: array<string,string>,
     *   reference?: string,
     * }|InboundEmailCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<InboundEmailNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|InboundEmailCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = InboundEmailCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'v4/inbound-email',
            body: (object) $parsed,
            options: $options,
            convert: InboundEmailNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve details of a specific mailbox including statistics.
     *
     * @param string $inboundEmailID Inbound Email ID (e.g., ie_a1b2c3d4e5f6)
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<InboundEmailGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $inboundEmailID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['v4/inbound-email/%1$s', $inboundEmailID],
            options: $requestOptions,
            convert: InboundEmailGetResponse::class,
        );
    }

    /**
     * @api
     *
     * List all mailboxes associated with your API key.
     * Returns active and inactive mailboxes (deleted mailboxes are excluded).
     *
     * @param array{
     *   limit?: int, offset?: int, status?: Status|value-of<Status>
     * }|InboundEmailListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<InboundEmailListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|InboundEmailListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = InboundEmailListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'v4/inbound-email',
            query: $parsed,
            options: $options,
            convert: InboundEmailListResponse::class,
        );
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
     * @return BaseResponse<InboundEmailDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $inboundEmailID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['v4/inbound-email/%1$s', $inboundEmailID],
            options: $requestOptions,
            convert: InboundEmailDeleteResponse::class,
        );
    }
}
