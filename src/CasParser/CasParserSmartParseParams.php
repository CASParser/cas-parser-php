<?php

declare(strict_types=1);

namespace CasParser\CasParser;

use CasParser\Core\Attributes\Api;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Concerns\SdkParams;
use CasParser\Core\Contracts\BaseModel;

/**
 * This endpoint parses CAS (Consolidated Account Statement) PDF files from NSDL, CDSL, or CAMS/KFintech and returns data in a unified format.
 * It auto-detects the CAS type and transforms the data into a consistent structure regardless of the source.
 *
 * @see CasParser\CasParser->smartParse
 *
 * @phpstan-type CasParserSmartParseParamsShape = array{
 *   password?: string, pdfFile?: string, pdfURL?: string
 * }
 */
final class CasParserSmartParseParams implements BaseModel
{
    /** @use SdkModel<CasParserSmartParseParamsShape> */
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
        $this->initialize();
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
