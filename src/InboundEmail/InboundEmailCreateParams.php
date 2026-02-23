<?php

declare(strict_types=1);

namespace CasParser\InboundEmail;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Attributes\Required;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Concerns\SdkParams;
use CasParser\Core\Contracts\BaseModel;
use CasParser\InboundEmail\InboundEmailCreateParams\AllowedSource;

/**
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
 * @see CasParser\Services\InboundEmailService::create()
 *
 * @phpstan-type InboundEmailCreateParamsShape = array{
 *   callbackURL: string,
 *   alias?: string|null,
 *   allowedSources?: list<AllowedSource|value-of<AllowedSource>>|null,
 *   metadata?: array<string,string>|null,
 *   reference?: string|null,
 * }
 */
final class InboundEmailCreateParams implements BaseModel
{
    /** @use SdkModel<InboundEmailCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Webhook URL where we POST email notifications.
     * Must be HTTPS in production (HTTP allowed for localhost during development).
     */
    #[Required('callback_url')]
    public string $callbackURL;

    /**
     * Optional custom email prefix for user-friendly addresses.
     * - Must be 3-32 characters
     * - Alphanumeric + hyphens only
     * - Must start and end with letter/number
     * - Example: `john-portfolio@import.casparser.in`
     * - If omitted, generates random ID like `ie_abc123xyz@import.casparser.in`.
     */
    #[Optional]
    public ?string $alias;

    /**
     * Filter emails by CAS provider. If omitted, accepts all providers.
     * - `cdsl` → eCAS@cdslstatement.com
     * - `nsdl` → NSDL-CAS@nsdl.co.in
     * - `cams` → donotreply@camsonline.com
     * - `kfintech` → samfS@kfintech.com.
     *
     * @var list<value-of<AllowedSource>>|null $allowedSources
     */
    #[Optional('allowed_sources', list: AllowedSource::class)]
    public ?array $allowedSources;

    /**
     * Optional key-value pairs (max 10) to include in webhook payload.
     * Useful for passing context like plan_type, campaign_id, etc.
     *
     * @var array<string,string>|null $metadata
     */
    #[Optional(map: 'string')]
    public ?array $metadata;

    /**
     * Your internal identifier (e.g., user_id, account_id).
     * Returned in webhook payload for correlation.
     */
    #[Optional]
    public ?string $reference;

    /**
     * `new InboundEmailCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InboundEmailCreateParams::with(callbackURL: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new InboundEmailCreateParams)->withCallbackURL(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<AllowedSource|value-of<AllowedSource>>|null $allowedSources
     * @param array<string,string>|null $metadata
     */
    public static function with(
        string $callbackURL,
        ?string $alias = null,
        ?array $allowedSources = null,
        ?array $metadata = null,
        ?string $reference = null,
    ): self {
        $self = new self;

        $self['callbackURL'] = $callbackURL;

        null !== $alias && $self['alias'] = $alias;
        null !== $allowedSources && $self['allowedSources'] = $allowedSources;
        null !== $metadata && $self['metadata'] = $metadata;
        null !== $reference && $self['reference'] = $reference;

        return $self;
    }

    /**
     * Webhook URL where we POST email notifications.
     * Must be HTTPS in production (HTTP allowed for localhost during development).
     */
    public function withCallbackURL(string $callbackURL): self
    {
        $self = clone $this;
        $self['callbackURL'] = $callbackURL;

        return $self;
    }

    /**
     * Optional custom email prefix for user-friendly addresses.
     * - Must be 3-32 characters
     * - Alphanumeric + hyphens only
     * - Must start and end with letter/number
     * - Example: `john-portfolio@import.casparser.in`
     * - If omitted, generates random ID like `ie_abc123xyz@import.casparser.in`.
     */
    public function withAlias(string $alias): self
    {
        $self = clone $this;
        $self['alias'] = $alias;

        return $self;
    }

    /**
     * Filter emails by CAS provider. If omitted, accepts all providers.
     * - `cdsl` → eCAS@cdslstatement.com
     * - `nsdl` → NSDL-CAS@nsdl.co.in
     * - `cams` → donotreply@camsonline.com
     * - `kfintech` → samfS@kfintech.com.
     *
     * @param list<AllowedSource|value-of<AllowedSource>> $allowedSources
     */
    public function withAllowedSources(array $allowedSources): self
    {
        $self = clone $this;
        $self['allowedSources'] = $allowedSources;

        return $self;
    }

    /**
     * Optional key-value pairs (max 10) to include in webhook payload.
     * Useful for passing context like plan_type, campaign_id, etc.
     *
     * @param array<string,string> $metadata
     */
    public function withMetadata(array $metadata): self
    {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }

    /**
     * Your internal identifier (e.g., user_id, account_id).
     * Returned in webhook payload for correlation.
     */
    public function withReference(string $reference): self
    {
        $self = clone $this;
        $self['reference'] = $reference;

        return $self;
    }
}
