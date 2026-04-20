<?php

declare(strict_types=1);

namespace CasParser\InboundEmail;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Concerns\SdkParams;
use CasParser\Core\Contracts\BaseModel;
use CasParser\InboundEmail\InboundEmailCreateParams\AllowedSource;

/**
 * Create a dedicated inbound email address for collecting CAS statements
 * via email forwarding. When an investor forwards a CAS email to this
 * address, we verify the sender and make the file available to you.
 *
 * `callback_url` is **optional**:
 * - **Set it** — we POST each parsed email to your webhook as it arrives.
 * - **Omit it** — retrieve files via `GET /v4/inbound-email/{id}/files`
 *   without building a webhook consumer.
 *
 * @see CasParser\Services\InboundEmailService::create()
 *
 * @phpstan-type InboundEmailCreateParamsShape = array{
 *   alias?: string|null,
 *   allowedSources?: list<AllowedSource|value-of<AllowedSource>>|null,
 *   callbackURL?: string|null,
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
     * Optional custom email prefix (e.g.
     * `john-portfolio@import.casparser.in`). 3-32 chars,
     * alphanumeric + hyphens, must start/end with a letter or
     * number. If omitted, a random ID is generated.
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
     * Optional webhook URL where we POST parsed emails. Must be
     * HTTPS in production (HTTP allowed for localhost). If omitted,
     * retrieve files via `GET /v4/inbound-email/{id}/files`.
     */
    #[Optional('callback_url', nullable: true)]
    public ?string $callbackURL;

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
        ?string $alias = null,
        ?array $allowedSources = null,
        ?string $callbackURL = null,
        ?array $metadata = null,
        ?string $reference = null,
    ): self {
        $self = new self;

        null !== $alias && $self['alias'] = $alias;
        null !== $allowedSources && $self['allowedSources'] = $allowedSources;
        null !== $callbackURL && $self['callbackURL'] = $callbackURL;
        null !== $metadata && $self['metadata'] = $metadata;
        null !== $reference && $self['reference'] = $reference;

        return $self;
    }

    /**
     * Optional custom email prefix (e.g.
     * `john-portfolio@import.casparser.in`). 3-32 chars,
     * alphanumeric + hyphens, must start/end with a letter or
     * number. If omitted, a random ID is generated.
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
     * Optional webhook URL where we POST parsed emails. Must be
     * HTTPS in production (HTTP allowed for localhost). If omitted,
     * retrieve files via `GET /v4/inbound-email/{id}/files`.
     */
    public function withCallbackURL(?string $callbackURL): self
    {
        $self = clone $this;
        $self['callbackURL'] = $callbackURL;

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
