<?php

declare(strict_types=1);

namespace CasParser\ContractNote;

use CasParser\ContractNote\ContractNoteParseParams\BrokerType;
use CasParser\Core\Attributes\Optional;
use CasParser\Core\Concerns\SdkModel;
use CasParser\Core\Concerns\SdkParams;
use CasParser\Core\Contracts\BaseModel;

/**
 * This endpoint parses Contract Note PDF files from various brokers including Zerodha, Groww, Upstox, ICICI Securities, and others.
 *
 * **What is a Contract Note?**
 * A contract note is a legal document that provides details of all trades executed by an investor. It includes:
 * - Trade details with timestamps, quantities, and prices
 * - Brokerage and charges breakdown
 * - Settlement information
 * - Regulatory compliance details
 *
 * **Supported Brokers:**
 * - Zerodha Broking Limited
 * - Groww Invest Tech Private Limited
 * - Upstox (RKSV Securities)
 * - ICICI Securities Limited
 * - Auto-detection for unknown brokers
 *
 * **Key Features:**
 * - **Auto-detection**: Automatically identifies broker type from PDF content
 * - **Comprehensive parsing**: Extracts equity transactions, derivatives transactions, detailed trades, and charges
 * - **Flexible input**: Accepts both file upload and URL-based PDF input
 * - **Password protection**: Supports password-protected PDFs
 *
 * The API returns structured data including contract note information, client details, transaction summaries, and detailed trade-by-trade breakdowns.
 *
 * @see CasParser\Services\ContractNoteService::parse()
 *
 * @phpstan-type ContractNoteParseParamsShape = array{
 *   brokerType?: null|BrokerType|value-of<BrokerType>,
 *   password?: string|null,
 *   pdfFile?: string|null,
 *   pdfURL?: string|null,
 * }
 */
final class ContractNoteParseParams implements BaseModel
{
    /** @use SdkModel<ContractNoteParseParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Optional broker type override. If not provided, system will auto-detect.
     *
     * @var value-of<BrokerType>|null $brokerType
     */
    #[Optional('broker_type', enum: BrokerType::class)]
    public ?string $brokerType;

    /**
     * Password for the PDF file (usually PAN number for Zerodha).
     */
    #[Optional]
    public ?string $password;

    /**
     * Base64 encoded contract note PDF file.
     */
    #[Optional('pdf_file')]
    public ?string $pdfFile;

    /**
     * URL to the contract note PDF file.
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
     *
     * @param BrokerType|value-of<BrokerType>|null $brokerType
     */
    public static function with(
        BrokerType|string|null $brokerType = null,
        ?string $password = null,
        ?string $pdfFile = null,
        ?string $pdfURL = null,
    ): self {
        $self = new self;

        null !== $brokerType && $self['brokerType'] = $brokerType;
        null !== $password && $self['password'] = $password;
        null !== $pdfFile && $self['pdfFile'] = $pdfFile;
        null !== $pdfURL && $self['pdfURL'] = $pdfURL;

        return $self;
    }

    /**
     * Optional broker type override. If not provided, system will auto-detect.
     *
     * @param BrokerType|value-of<BrokerType> $brokerType
     */
    public function withBrokerType(BrokerType|string $brokerType): self
    {
        $self = clone $this;
        $self['brokerType'] = $brokerType;

        return $self;
    }

    /**
     * Password for the PDF file (usually PAN number for Zerodha).
     */
    public function withPassword(string $password): self
    {
        $self = clone $this;
        $self['password'] = $password;

        return $self;
    }

    /**
     * Base64 encoded contract note PDF file.
     */
    public function withPdfFile(string $pdfFile): self
    {
        $self = clone $this;
        $self['pdfFile'] = $pdfFile;

        return $self;
    }

    /**
     * URL to the contract note PDF file.
     */
    public function withPdfURL(string $pdfURL): self
    {
        $self = clone $this;
        $self['pdfURL'] = $pdfURL;

        return $self;
    }
}
