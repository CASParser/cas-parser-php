<?php

declare(strict_types=1);

namespace CasParser\InboundEmail;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Contracts\BaseModel;
use CasParser\InboundEmail\InboundEmailListResponse\InboundEmail;

/**
 * @phpstan-import-type InboundEmailShape from \CasParser\InboundEmail\InboundEmailListResponse\InboundEmail
 *
 * @phpstan-type InboundEmailListResponseShape = array{
 *   inboundEmails?: list<InboundEmail|InboundEmailShape>|null,
 *   limit?: int|null,
 *   offset?: int|null,
 *   status?: string|null,
 *   total?: int|null,
 * }
 */
final class InboundEmailListResponse implements BaseModel
{
    /** @use SdkModel<InboundEmailListResponseShape> */
    use SdkModel;

    /** @var list<InboundEmail>|null $inboundEmails */
    #[Optional('inbound_emails', list: InboundEmail::class)]
    public ?array $inboundEmails;

    #[Optional]
    public ?int $limit;

    #[Optional]
    public ?int $offset;

    #[Optional]
    public ?string $status;

    /**
     * Total number of inbound emails (for pagination).
     */
    #[Optional]
    public ?int $total;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<InboundEmail|InboundEmailShape>|null $inboundEmails
     */
    public static function with(
        ?array $inboundEmails = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $status = null,
        ?int $total = null,
    ): self {
        $self = new self;

        null !== $inboundEmails && $self['inboundEmails'] = $inboundEmails;
        null !== $limit && $self['limit'] = $limit;
        null !== $offset && $self['offset'] = $offset;
        null !== $status && $self['status'] = $status;
        null !== $total && $self['total'] = $total;

        return $self;
    }

    /**
     * @param list<InboundEmail|InboundEmailShape> $inboundEmails
     */
    public function withInboundEmails(array $inboundEmails): self
    {
        $self = clone $this;
        $self['inboundEmails'] = $inboundEmails;

        return $self;
    }

    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    public function withOffset(int $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Total number of inbound emails (for pagination).
     */
    public function withTotal(int $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

        return $self;
    }
}
