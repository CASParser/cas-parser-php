<?php

declare(strict_types=1);

namespace CasParser\CasParser;

use CasParser\Core\Attributes\Api;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Concerns\SdkParams;
use CasParser\Core\Contracts\BaseModel;

/**
 * This endpoint specifically parses CAMS/KFintech CAS (Consolidated Account Statement) PDF files and returns data in a unified format.
 * Use this endpoint when you know the PDF is from CAMS or KFintech.
 *
 * @see CasParser\CasParser->camsKfintech
 *
 * @phpstan-type CasParserCamsKfintechParamsShape = array{
 *   password?: string, pdf_file?: string, pdf_url?: string
 * }
 */
final class CasParserCamsKfintechParams implements BaseModel
{
    /** @use SdkModel<CasParserCamsKfintechParamsShape> */
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
    #[Api(optional: true)]
    public ?string $pdf_file;

    /**
     * URL to the CAS PDF file.
     */
    #[Api(optional: true)]
    public ?string $pdf_url;

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
        ?string $pdf_file = null,
        ?string $pdf_url = null
    ): self {
        $obj = new self;

        null !== $password && $obj->password = $password;
        null !== $pdf_file && $obj->pdf_file = $pdf_file;
        null !== $pdf_url && $obj->pdf_url = $pdf_url;

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
        $obj->pdf_file = $pdfFile;

        return $obj;
    }

    /**
     * URL to the CAS PDF file.
     */
    public function withPdfURL(string $pdfURL): self
    {
        $obj = clone $this;
        $obj->pdf_url = $pdfURL;

        return $obj;
    }
}
