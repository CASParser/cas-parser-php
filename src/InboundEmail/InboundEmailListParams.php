<?php

declare(strict_types=1);

namespace CasParser\InboundEmail;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Concerns\SdkParams;
use CasParser\Core\Contracts\BaseModel;
use CasParser\InboundEmail\InboundEmailListParams\Status;

/**
 * List all mailboxes associated with your API key.
 * Returns active and inactive mailboxes (deleted mailboxes are excluded).
 *
 * @see CasParser\Services\InboundEmailService::list()
 *
 * @phpstan-type InboundEmailListParamsShape = array{
 *   limit?: int|null, offset?: int|null, status?: null|Status|value-of<Status>
 * }
 */
final class InboundEmailListParams implements BaseModel
{
    /** @use SdkModel<InboundEmailListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Maximum number of inbound emails to return.
     */
    #[Optional]
    public ?int $limit;

    /**
     * Pagination offset.
     */
    #[Optional]
    public ?int $offset;

    /**
     * Filter by status.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Status|value-of<Status>|null $status
     */
    public static function with(
        ?int $limit = null,
        ?int $offset = null,
        Status|string|null $status = null
    ): self {
        $self = new self;

        null !== $limit && $self['limit'] = $limit;
        null !== $offset && $self['offset'] = $offset;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    /**
     * Maximum number of inbound emails to return.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Pagination offset.
     */
    public function withOffset(int $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }

    /**
     * Filter by status.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
