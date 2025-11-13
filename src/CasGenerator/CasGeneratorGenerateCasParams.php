<?php

declare(strict_types=1);

namespace CasParser\CasGenerator;

use CasParser\CasGenerator\CasGeneratorGenerateCasParams\CasAuthority;
use CasParser\Core\Attributes\Api;
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
 *   from_date: string,
 *   password: string,
 *   to_date: string,
 *   cas_authority?: CasAuthority|value-of<CasAuthority>,
 *   pan_no?: string,
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
    #[Api]
    public string $email;

    /**
     * Start date for the CAS period (format YYYY-MM-DD).
     */
    #[Api]
    public string $from_date;

    /**
     * Password to protect the generated CAS PDF.
     */
    #[Api]
    public string $password;

    /**
     * End date for the CAS period (format YYYY-MM-DD).
     */
    #[Api]
    public string $to_date;

    /**
     * CAS authority to generate the document from (currently only kfintech is supported).
     *
     * @var value-of<CasAuthority>|null $cas_authority
     */
    #[Api(enum: CasAuthority::class, optional: true)]
    public ?string $cas_authority;

    /**
     * PAN number (optional for some CAS authorities).
     */
    #[Api(optional: true)]
    public ?string $pan_no;

    /**
     * `new CasGeneratorGenerateCasParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CasGeneratorGenerateCasParams::with(
     *   email: ..., from_date: ..., password: ..., to_date: ...
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
     * @param CasAuthority|value-of<CasAuthority> $cas_authority
     */
    public static function with(
        string $email,
        string $from_date,
        string $password,
        string $to_date,
        CasAuthority|string|null $cas_authority = null,
        ?string $pan_no = null,
    ): self {
        $obj = new self;

        $obj->email = $email;
        $obj->from_date = $from_date;
        $obj->password = $password;
        $obj->to_date = $to_date;

        null !== $cas_authority && $obj['cas_authority'] = $cas_authority;
        null !== $pan_no && $obj->pan_no = $pan_no;

        return $obj;
    }

    /**
     * Email address to receive the CAS document.
     */
    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj->email = $email;

        return $obj;
    }

    /**
     * Start date for the CAS period (format YYYY-MM-DD).
     */
    public function withFromDate(string $fromDate): self
    {
        $obj = clone $this;
        $obj->from_date = $fromDate;

        return $obj;
    }

    /**
     * Password to protect the generated CAS PDF.
     */
    public function withPassword(string $password): self
    {
        $obj = clone $this;
        $obj->password = $password;

        return $obj;
    }

    /**
     * End date for the CAS period (format YYYY-MM-DD).
     */
    public function withToDate(string $toDate): self
    {
        $obj = clone $this;
        $obj->to_date = $toDate;

        return $obj;
    }

    /**
     * CAS authority to generate the document from (currently only kfintech is supported).
     *
     * @param CasAuthority|value-of<CasAuthority> $casAuthority
     */
    public function withCasAuthority(CasAuthority|string $casAuthority): self
    {
        $obj = clone $this;
        $obj['cas_authority'] = $casAuthority;

        return $obj;
    }

    /**
     * PAN number (optional for some CAS authorities).
     */
    public function withPanNo(string $panNo): self
    {
        $obj = clone $this;
        $obj->pan_no = $panNo;

        return $obj;
    }
}
