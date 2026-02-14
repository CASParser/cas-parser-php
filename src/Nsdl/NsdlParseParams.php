<?php

declare(strict_types=1);

namespace CasParser\Nsdl;

use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Concerns\SdkParams;
use CasParser\Core\Contracts\BaseModel;

/**
 * This endpoint specifically parses NSDL CAS (Consolidated Account Statement) PDF files and returns data in a unified format.
 * Use this endpoint when you know the PDF is from NSDL.
 *
 * @see CasParser\Services\NsdlService::parse()
 *
 * @phpstan-type NsdlParseParamsShape = array{
 *   password?: string|null, pdfFile?: string|null, pdfURL?: string|null
 * }
 */
final class NsdlParseParams implements BaseModel
{
    /** @use SdkModel<NsdlParseParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Password for the PDF file (if required).
     */
    #[Optional]
    public ?string $password;

    /**
     * Base64 encoded CAS PDF file (required if pdf_url not provided).
     */
    #[Optional('pdf_file')]
    public ?string $pdfFile;

    /**
     * URL to the CAS PDF file (required if pdf_file not provided).
     */
    #[Optional('pdf_url')]
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
        $self = new self;

        null !== $password && $self['password'] = $password;
        null !== $pdfFile && $self['pdfFile'] = $pdfFile;
        null !== $pdfURL && $self['pdfURL'] = $pdfURL;

        return $self;
    }

    /**
     * Password for the PDF file (if required).
     */
    public function withPassword(string $password): self
    {
        $self = clone $this;
        $self['password'] = $password;

        return $self;
    }

    /**
     * Base64 encoded CAS PDF file (required if pdf_url not provided).
     */
    public function withPdfFile(string $pdfFile): self
    {
        $self = clone $this;
        $self['pdfFile'] = $pdfFile;

        return $self;
    }

    /**
     * URL to the CAS PDF file (required if pdf_file not provided).
     */
    public function withPdfURL(string $pdfURL): self
    {
        $self = clone $this;
        $self['pdfURL'] = $pdfURL;

        return $self;
    }
}
