<?php

declare(strict_types=1);

namespace CasParser\CasGenerator;

use CasParser\CasGenerator\CasGeneratorGenerateCasParams\CasAuthority;
use CasParser\Core\Attributes\Api;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Concerns\SdkParams;
use CasParser\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new CasGeneratorGenerateCasParams); // set properties as needed
 * $client->casGenerator->generateCas(...$params->toArray());
 * ```
 * This endpoint generates CAS (Consolidated Account Statement) documents by submitting a mailback request to the specified CAS authority.
 * Currently only supports KFintech, with plans to support CAMS, CDSL, and NSDL in the future.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->casGenerator->generateCas(...$params->toArray());`
 *
 * @see CasParser\CasGenerator->generateCas
 *
 * @phpstan-type cas_generator_generate_cas_params = array{
 *   email: string,
 *   fromDate: string,
 *   password: string,
 *   toDate: string,
 *   casAuthority?: CasAuthority::*,
 *   panNo?: string,
 * }
 */
final class CasGeneratorGenerateCasParams implements BaseModel
{
    /** @use SdkModel<cas_generator_generate_cas_params> */
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
    #[Api('from_date')]
    public string $fromDate;

    /**
     * Password to protect the generated CAS PDF.
     */
    #[Api]
    public string $password;

    /**
     * End date for the CAS period (format YYYY-MM-DD).
     */
    #[Api('to_date')]
    public string $toDate;

    /**
     * CAS authority to generate the document from (currently only kfintech is supported).
     *
     * @var CasAuthority::*|null $casAuthority
     */
    #[Api('cas_authority', enum: CasAuthority::class, optional: true)]
    public ?string $casAuthority;

    /**
     * PAN number (optional for some CAS authorities).
     */
    #[Api('pan_no', optional: true)]
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
     * @param CasAuthority::* $casAuthority
     */
    public static function with(
        string $email,
        string $fromDate,
        string $password,
        string $toDate,
        ?string $casAuthority = null,
        ?string $panNo = null,
    ): self {
        $obj = new self;

        $obj->email = $email;
        $obj->fromDate = $fromDate;
        $obj->password = $password;
        $obj->toDate = $toDate;

        null !== $casAuthority && $obj->casAuthority = $casAuthority;
        null !== $panNo && $obj->panNo = $panNo;

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
        $obj->fromDate = $fromDate;

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
        $obj->toDate = $toDate;

        return $obj;
    }

    /**
     * CAS authority to generate the document from (currently only kfintech is supported).
     *
     * @param CasAuthority::* $casAuthority
     */
    public function withCasAuthority(string $casAuthority): self
    {
        $obj = clone $this;
        $obj->casAuthority = $casAuthority;

        return $obj;
    }

    /**
     * PAN number (optional for some CAS authorities).
     */
    public function withPanNo(string $panNo): self
    {
        $obj = clone $this;
        $obj->panNo = $panNo;

        return $obj;
    }
}
