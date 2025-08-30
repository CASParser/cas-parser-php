<?php

declare(strict_types=1);

namespace CasParser;

use CasParser\Core\BaseClient;
use CasParser\Core\Services\CasGeneratorService;
use CasParser\Core\Services\CasParserService;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;

class Client extends BaseClient
{
    public string $apiKey;

    /**
     * @api
     */
    public CasParserService $casParser;

    /**
     * @api
     */
    public CasGeneratorService $casGenerator;

    public function __construct(?string $apiKey = null, ?string $baseUrl = null)
    {
        $this->apiKey = (string) ($apiKey ?? getenv('CAS_PARSER_API_KEY'));

        $base = $baseUrl ?? getenv(
            'CAS_PARSER_BASE_URL'
        ) ?: 'https://portfolio-parser.api.casparser.in';

        $options = RequestOptions::with(
            uriFactory: Psr17FactoryDiscovery::findUriFactory(),
            streamFactory: Psr17FactoryDiscovery::findStreamFactory(),
            requestFactory: Psr17FactoryDiscovery::findRequestFactory(),
            transporter: Psr18ClientDiscovery::find(),
        );

        parent::__construct(
            headers: [
                'Content-Type' => 'application/json', 'Accept' => 'application/json',
            ],
            baseUrl: $base,
            options: $options,
        );

        $this->casParser = new CasParserService($this);
        $this->casGenerator = new CasGeneratorService($this);
    }

    /** @return array<string, string> */
    protected function authHeaders(): array
    {
        return ['x-api-key' => $this->apiKey];
    }
}
