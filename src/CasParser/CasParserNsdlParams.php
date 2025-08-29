<?php

declare(strict_types=1);

namespace CasParser\CasParser;

use CasParser\Core\Attributes\Api;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Concerns\SdkParams;
use CasParser\Core\Contracts\BaseModel;

/**
 * This endpoint specifically parses NSDL CAS (Consolidated Account Statement) PDF files and returns data in a unified format.
 * Use this endpoint when you know the PDF is from NSDL.
 *
 * @see CasParser\CasParser->nsdl
 *
 * @phpstan-type cas_parser_nsdl_params = array{
 *   password?: string, pdfFile?: string, pdfURL?: string
 * }
 */
final class CasParserNsdlParams implements BaseModel
{
    /** @use SdkModel<cas_parser_nsdl_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Password for the PDF file (if required).
     */
    #[Api(optional: true)]
    public ?string $password;

    /**
     * Base64 encoded CAS PDF file.
     */
    #[Api('pdf_file', optional: true)]
    public ?string $pdfFile;

    /**
     * URL to the CAS PDF file.
     */
    #[Api('pdf_url', optional: true)]
    public ?string $pdfURL;

    public function __construct()
    {
        self::introspect();
        $this->unsetOptionalProperties();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $password = null,
        ?string $pdfFile = null,
        ?string $pdfURL = null
    ): self {
        $obj = new self;

        null !== $password && $obj->password = $password;
        null !== $pdfFile && $obj->pdfFile = $pdfFile;
        null !== $pdfURL && $obj->pdfURL = $pdfURL;

        return $obj;
    }

    /**
     * Password for the PDF file (if required).
     */
    public function withPassword(string $password): self
    {
        $obj = clone $this;
        $obj->password = $password;

        return $obj;
    }

    /**
     * Base64 encoded CAS PDF file.
     */
    public function withPdfFile(string $pdfFile): self
    {
        $obj = clone $this;
        $obj->pdfFile = $pdfFile;

        return $obj;
    }

    /**
     * URL to the CAS PDF file.
     */
    public function withPdfURL(string $pdfURL): self
    {
        $obj = clone $this;
        $obj->pdfURL = $pdfURL;

        return $obj;
    }
}
