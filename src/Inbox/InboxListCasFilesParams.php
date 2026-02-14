<?php

declare(strict_types=1);

namespace CasParser\Inbox;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Attributes\Required;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Concerns\SdkParams;
use CasParser\Core\Contracts\BaseModel;
use CasParser\Inbox\InboxListCasFilesParams\CasType;

/**
 * Search the user's email inbox for CAS files from known senders
 * (CAMS, KFintech, CDSL, NSDL).
 *
 * Files are uploaded to temporary cloud storage. **URLs expire in 24 hours.**
 *
 * Optionally filter by CAS provider and date range.
 *
 * **Billing:** 0.2 credits per request (charged regardless of success or number of files found).
 *
 * @see CasParser\Services\InboxService::listCasFiles()
 *
 * @phpstan-type InboxListCasFilesParamsShape = array{
 *   xInboxToken: string,
 *   casTypes?: list<CasType|value-of<CasType>>|null,
 *   endDate?: string|null,
 *   startDate?: string|null,
 * }
 */
final class InboxListCasFilesParams implements BaseModel
{
    /** @use SdkModel<InboxListCasFilesParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $xInboxToken;

    /**
     * Filter by CAS provider(s):
     * - `cdsl` → eCAS@cdslstatement.com
     * - `nsdl` → NSDL-CAS@nsdl.co.in
     * - `cams` → donotreply@camsonline.com
     * - `kfintech` → samfS@kfintech.com
     *
     * @var list<value-of<CasType>>|null $casTypes
     */
    #[Optional('cas_types', list: CasType::class)]
    public ?array $casTypes;

    /**
     * End date in ISO format (YYYY-MM-DD). Defaults to today.
     */
    #[Optional('end_date')]
    public ?string $endDate;

    /**
     * Start date in ISO format (YYYY-MM-DD). Defaults to 30 days ago.
     */
    #[Optional('start_date')]
    public ?string $startDate;

    /**
     * `new InboxListCasFilesParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InboxListCasFilesParams::with(xInboxToken: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new InboxListCasFilesParams)->withXInboxToken(...)
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
     * @param list<CasType|value-of<CasType>>|null $casTypes
     */
    public static function with(
        string $xInboxToken,
        ?array $casTypes = null,
        ?string $endDate = null,
        ?string $startDate = null,
    ): self {
        $self = new self;

        $self['xInboxToken'] = $xInboxToken;

        null !== $casTypes && $self['casTypes'] = $casTypes;
        null !== $endDate && $self['endDate'] = $endDate;
        null !== $startDate && $self['startDate'] = $startDate;

        return $self;
    }

    public function withXInboxToken(string $xInboxToken): self
    {
        $self = clone $this;
        $self['xInboxToken'] = $xInboxToken;

        return $self;
    }

    /**
     * Filter by CAS provider(s):
     * - `cdsl` → eCAS@cdslstatement.com
     * - `nsdl` → NSDL-CAS@nsdl.co.in
     * - `cams` → donotreply@camsonline.com
     * - `kfintech` → samfS@kfintech.com
     *
     * @param list<CasType|value-of<CasType>> $casTypes
     */
    public function withCasTypes(array $casTypes): self
    {
        $self = clone $this;
        $self['casTypes'] = $casTypes;

        return $self;
    }

    /**
     * End date in ISO format (YYYY-MM-DD). Defaults to today.
     */
    public function withEndDate(string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * Start date in ISO format (YYYY-MM-DD). Defaults to 30 days ago.
     */
    public function withStartDate(string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }
}
