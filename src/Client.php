<?php

declare(strict_types=1);

namespace CasParser;

use CasParser\Core\BaseClient;
use CasParser\Core\Services\CasGeneratorService;
use CasParser\Core\Services\CasParserService;

class Client extends BaseClient
{
    public string $apiKey;

    public CasParserService $casParser;

    public CasGeneratorService $casGenerator;

    public function __construct(?string $apiKey = null, ?string $baseUrl = null)
    {
        $this->apiKey = (string) ($apiKey ?? getenv('CAS_PARSER_API_KEY'));

        $base = $baseUrl ?? getenv(
            'CAS_PARSER_BASE_URL'
        ) ?: 'https://portfolio-parser.api.casparser.in';

        parent::__construct(
            headers: [
                'Content-Type' => 'application/json', 'Accept' => 'application/json',
            ],
            baseUrl: $base,
            options: new RequestOptions,
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
