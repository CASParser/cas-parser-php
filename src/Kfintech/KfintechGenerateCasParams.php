<?php

declare(strict_types=1);

namespace CasParser\Kfintech;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Attributes\Required;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Concerns\SdkParams;
use CasParser\Core\Contracts\BaseModel;

/**
 * Generate CAS via KFintech mailback. The CAS PDF will be sent to the investor's email.
 *
 * This is an async operation - the investor receives the CAS via email within a few minutes.
 * For instant CAS retrieval, use CDSL Fetch (`/v4/cdsl/fetch`).
 *
 * @see CasParser\Services\KfintechService::generateCas()
 *
 * @phpstan-type KfintechGenerateCasParamsShape = array{
 *   email: string,
 *   fromDate: string,
 *   password: string,
 *   toDate: string,
 *   panNo?: string|null,
 * }
 */
final class KfintechGenerateCasParams implements BaseModel
{
    /** @use SdkModel<KfintechGenerateCasParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Email address to receive the CAS document.
     */
    #[Required]
    public string $email;

    /**
     * Start date (YYYY-MM-DD).
     */
    #[Required('from_date')]
    public string $fromDate;

    /**
     * Password for the PDF.
     */
    #[Required]
    public string $password;

    /**
     * End date (YYYY-MM-DD).
     */
    #[Required('to_date')]
    public string $toDate;

    /**
     * PAN number (optional).
     */
    #[Optional('pan_no')]
    public ?string $panNo;

    /**
     * `new KfintechGenerateCasParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * KfintechGenerateCasParams::with(
     *   email: ..., fromDate: ..., password: ..., toDate: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new KfintechGenerateCasParams)
     *   ->withEmail(...)
     *   ->withFromDate(...)
     *   ->withPassword(...)
     *   ->withToDate(...)
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
     */
    public static function with(
        string $email,
        string $fromDate,
        string $password,
        string $toDate,
        ?string $panNo = null,
    ): self {
        $self = new self;

        $self['email'] = $email;
        $self['fromDate'] = $fromDate;
        $self['password'] = $password;
        $self['toDate'] = $toDate;

        null !== $panNo && $self['panNo'] = $panNo;

        return $self;
    }

    /**
     * Email address to receive the CAS document.
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * Start date (YYYY-MM-DD).
     */
    public function withFromDate(string $fromDate): self
    {
        $self = clone $this;
        $self['fromDate'] = $fromDate;

        return $self;
    }

    /**
     * Password for the PDF.
     */
    public function withPassword(string $password): self
    {
        $self = clone $this;
        $self['password'] = $password;

        return $self;
    }

    /**
     * End date (YYYY-MM-DD).
     */
    public function withToDate(string $toDate): self
    {
        $self = clone $this;
        $self['toDate'] = $toDate;

        return $self;
    }

    /**
     * PAN number (optional).
     */
    public function withPanNo(string $panNo): self
    {
        $self = clone $this;
        $self['panNo'] = $panNo;

        return $self;
    }
}
