<?php

declare(strict_types=1);

namespace CasParser\CasGenerator;

use CasParser\CasGenerator\CasGeneratorGenerateCasParams\CasAuthority;
use CasParser\Core\Attributes\Optional;
use CasParser\Core\Attributes\Required;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Concerns\SdkParams;
use CasParser\Core\Contracts\BaseModel;

/**
 * This endpoint generates CAS (Consolidated Account Statement) documents by submitting a mailback request to the specified CAS authority.
 * Currently only supports KFintech, with plans to support CAMS, CDSL, and NSDL in the future.
 *
 * @see CasParser\Services\CasGeneratorService::generateCas()
 *
 * @phpstan-type CasGeneratorGenerateCasParamsShape = array{
 *   email: string,
 *   fromDate: string,
 *   password: string,
 *   toDate: string,
 *   casAuthority?: null|CasAuthority|value-of<CasAuthority>,
 *   panNo?: string|null,
 * }
 */
final class CasGeneratorGenerateCasParams implements BaseModel
{
    /** @use SdkModel<CasGeneratorGenerateCasParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Email address to receive the CAS document.
     */
    #[Required]
    public string $email;

    /**
     * Start date for the CAS period (format YYYY-MM-DD).
     */
    #[Required('from_date')]
    public string $fromDate;

    /**
     * Password to protect the generated CAS PDF.
     */
    #[Required]
    public string $password;

    /**
     * End date for the CAS period (format YYYY-MM-DD).
     */
    #[Required('to_date')]
    public string $toDate;

    /**
     * CAS authority to generate the document from (currently only kfintech is supported).
     *
     * @var value-of<CasAuthority>|null $casAuthority
     */
    #[Optional('cas_authority', enum: CasAuthority::class)]
    public ?string $casAuthority;

    /**
     * PAN number (optional for some CAS authorities).
     */
    #[Optional('pan_no')]
    public ?string $panNo;

    /**
     * `new CasGeneratorGenerateCasParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CasGeneratorGenerateCasParams::with(
     *   email: ..., fromDate: ..., password: ..., toDate: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CasGeneratorGenerateCasParams)
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
     *
     * @param CasAuthority|value-of<CasAuthority>|null $casAuthority
     */
    public static function with(
        string $email,
        string $fromDate,
        string $password,
        string $toDate,
        CasAuthority|string|null $casAuthority = null,
        ?string $panNo = null,
    ): self {
        $self = new self;

        $self['email'] = $email;
        $self['fromDate'] = $fromDate;
        $self['password'] = $password;
        $self['toDate'] = $toDate;

        null !== $casAuthority && $self['casAuthority'] = $casAuthority;
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
     * Start date for the CAS period (format YYYY-MM-DD).
     */
    public function withFromDate(string $fromDate): self
    {
        $self = clone $this;
        $self['fromDate'] = $fromDate;

        return $self;
    }

    /**
     * Password to protect the generated CAS PDF.
     */
    public function withPassword(string $password): self
    {
        $self = clone $this;
        $self['password'] = $password;

        return $self;
    }

    /**
     * End date for the CAS period (format YYYY-MM-DD).
     */
    public function withToDate(string $toDate): self
    {
        $self = clone $this;
        $self['toDate'] = $toDate;

        return $self;
    }

    /**
     * CAS authority to generate the document from (currently only kfintech is supported).
     *
     * @param CasAuthority|value-of<CasAuthority> $casAuthority
     */
    public function withCasAuthority(CasAuthority|string $casAuthority): self
    {
        $self = clone $this;
        $self['casAuthority'] = $casAuthority;

        return $self;
    }

    /**
     * PAN number (optional for some CAS authorities).
     */
    public function withPanNo(string $panNo): self
    {
        $self = clone $this;
        $self['panNo'] = $panNo;

        return $self;
    }
}
