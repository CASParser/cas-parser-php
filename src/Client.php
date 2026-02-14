<?php

declare(strict_types=1);

namespace CasParser;

use CasParser\Core\BaseClient;
use CasParser\Core\Util;
use CasParser\Services\AccessTokenService;
use CasParser\Services\CamsKfintechService;
use CasParser\Services\CdslService;
use CasParser\Services\ContractNoteService;
use CasParser\Services\CreditsService;
use CasParser\Services\InboxService;
use CasParser\Services\KfintechService;
use CasParser\Services\LogsService;
use CasParser\Services\NsdlService;
use CasParser\Services\SmartService;
use CasParser\Services\VerifyTokenService;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;

/**
 * @phpstan-import-type NormalizedRequest from \CasParser\Core\BaseClient
 * @phpstan-import-type RequestOpts from \CasParser\RequestOptions
 */
class Client extends BaseClient
{
    public string $apiKey;

    /**
     * @api
     */
    public CreditsService $credits;

    /**
     * @api
     */
    public LogsService $logs;

    /**
     * @api
     */
    public AccessTokenService $accessToken;

    /**
     * @api
     */
    public VerifyTokenService $verifyToken;

    /**
     * @api
     */
    public CamsKfintechService $camsKfintech;

    /**
     * @api
     */
    public CdslService $cdsl;

    /**
     * @api
     */
    public ContractNoteService $contractNote;

    /**
     * @api
     */
    public InboxService $inbox;

    /**
     * @api
     */
    public KfintechService $kfintech;

    /**
     * @api
     */
    public NsdlService $nsdl;

    /**
     * @api
     */
    public SmartService $smart;

    /**
     * @param RequestOpts|null $requestOptions
     */
    public function __construct(
        ?string $apiKey = null,
        ?string $baseUrl = null,
        RequestOptions|array|null $requestOptions = null,
    ) {
        $this->apiKey = (string) ($apiKey ?? Util::getenv('CAS_PARSER_API_KEY'));

        $baseUrl ??= Util::getenv(
            'CAS_PARSER_BASE_URL'
        ) ?: 'https://portfolio-parser.api.casparser.in';

        $options = RequestOptions::parse(
            RequestOptions::with(
                uriFactory: Psr17FactoryDiscovery::findUriFactory(),
                streamFactory: Psr17FactoryDiscovery::findStreamFactory(),
                requestFactory: Psr17FactoryDiscovery::findRequestFactory(),
                transporter: Psr18ClientDiscovery::find(),
            ),
            $requestOptions,
        );

        parent::__construct(
            headers: [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'User-Agent' => sprintf('cas-parser/PHP %s', VERSION),
                'X-Stainless-Lang' => 'php',
                'X-Stainless-Package-Version' => '0.4.0',
                'X-Stainless-Arch' => Util::machtype(),
                'X-Stainless-OS' => Util::ostype(),
                'X-Stainless-Runtime' => php_sapi_name(),
                'X-Stainless-Runtime-Version' => phpversion(),
            ],
            baseUrl: $baseUrl,
            options: $options
        );

        $this->credits = new CreditsService($this);
        $this->logs = new LogsService($this);
        $this->accessToken = new AccessTokenService($this);
        $this->verifyToken = new VerifyTokenService($this);
        $this->camsKfintech = new CamsKfintechService($this);
        $this->cdsl = new CdslService($this);
        $this->contractNote = new ContractNoteService($this);
        $this->inbox = new InboxService($this);
        $this->kfintech = new KfintechService($this);
        $this->nsdl = new NsdlService($this);
        $this->smart = new SmartService($this);
    }

    /** @return array<string,string> */
    protected function authHeaders(): array
    {
        return $this->apiKey ? ['x-api-key' => $this->apiKey] : [];
    }

    /**
     * @internal
     *
     * @param string|list<string> $path
     * @param array<string,mixed> $query
     * @param array<string,string|int|list<string|int>|null> $headers
     * @param RequestOpts|null $opts
     *
     * @return array{NormalizedRequest, RequestOptions}
     */
    protected function buildRequest(
        string $method,
        string|array $path,
        array $query,
        array $headers,
        mixed $body,
        RequestOptions|array|null $opts,
    ): array {
        return parent::buildRequest(
            method: $method,
            path: $path,
            query: $query,
            headers: [...$this->authHeaders(), ...$headers],
            body: $body,
            opts: $opts,
        );
    }
}
