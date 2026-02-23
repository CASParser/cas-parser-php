<?php

declare(strict_types=1);

namespace CasParser\InboundEmail;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;
use CasParser\InboundEmail\InboundEmailNewResponse\AllowedSource;
use CasParser\InboundEmail\InboundEmailNewResponse\Status;

/**
 * An inbound email address for receiving forwarded CAS emails.
 *
 * @phpstan-type InboundEmailNewResponseShape = array{
 *   allowedSources?: list<AllowedSource|value-of<AllowedSource>>|null,
 *   callbackURL?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   email?: string|null,
 *   inboundEmailID?: string|null,
 *   metadata?: array<string,string>|null,
 *   reference?: string|null,
 *   status?: null|Status|value-of<Status>,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class InboundEmailNewResponse implements BaseModel
{
    /** @use SdkModel<InboundEmailNewResponseShape> */
    use SdkModel;

    /**
     * Accepted CAS providers (empty = all).
     *
     * @var list<value-of<AllowedSource>>|null $allowedSources
     */
    #[Optional('allowed_sources', list: AllowedSource::class)]
    public ?array $allowedSources;

    /**
     * Webhook URL for email notifications.
     */
    #[Optional('callback_url')]
    public ?string $callbackURL;

    /**
     * When the mailbox was created.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * The inbound email address to forward CAS statements to.
     */
    #[Optional]
    public ?string $email;

    /**
     * Unique inbound email identifier.
     */
    #[Optional('inbound_email_id')]
    public ?string $inboundEmailID;

    /**
     * Custom key-value metadata.
     *
     * @var array<string,string>|null $metadata
     */
    #[Optional(map: 'string')]
    public ?array $metadata;

    /**
     * Your internal reference identifier.
     */
    #[Optional(nullable: true)]
    public ?string $reference;

    /**
     * Current mailbox status.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * When the mailbox was last updated.
     */
    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

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
     * @param Status|value-of<Status>|null $status
     */
    public static function with(
        ?array $allowedSources = null,
        ?string $callbackURL = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $email = null,
        ?string $inboundEmailID = null,
        ?array $metadata = null,
        ?string $reference = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        null !== $allowedSources && $self['allowedSources'] = $allowedSources;
        null !== $callbackURL && $self['callbackURL'] = $callbackURL;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $email && $self['email'] = $email;
        null !== $inboundEmailID && $self['inboundEmailID'] = $inboundEmailID;
        null !== $metadata && $self['metadata'] = $metadata;
        null !== $reference && $self['reference'] = $reference;
        null !== $status && $self['status'] = $status;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Accepted CAS providers (empty = all).
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
     * Webhook URL for email notifications.
     */
    public function withCallbackURL(string $callbackURL): self
    {
        $self = clone $this;
        $self['callbackURL'] = $callbackURL;

        return $self;
    }

    /**
     * When the mailbox was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The inbound email address to forward CAS statements to.
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * Unique inbound email identifier.
     */
    public function withInboundEmailID(string $inboundEmailID): self
    {
        $self = clone $this;
        $self['inboundEmailID'] = $inboundEmailID;

        return $self;
    }

    /**
     * Custom key-value metadata.
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
     * Your internal reference identifier.
     */
    public function withReference(?string $reference): self
    {
        $self = clone $this;
        $self['reference'] = $reference;

        return $self;
    }

    /**
     * Current mailbox status.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * When the mailbox was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
