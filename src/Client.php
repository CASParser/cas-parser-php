<?php

declare(strict_types=1);

namespace CasParser;

use CasParser\Core\BaseClient;
use CasParser\Core\Util;
use CasParser\Services\CasGeneratorService;
use CasParser\Services\CasParserService;
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
    public CasParserService $casParser;

    /**
     * @api
     */
    public CasGeneratorService $casGenerator;

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
                'User-Agent' => sprintf('CAS Parser/PHP %s', VERSION),
                'X-Stainless-Lang' => 'php',
                'X-Stainless-Package-Version' => '0.0.1',
                'X-Stainless-Arch' => Util::machtype(),
                'X-Stainless-OS' => Util::ostype(),
                'X-Stainless-Runtime' => php_sapi_name(),
                'X-Stainless-Runtime-Version' => phpversion(),
            ],
            baseUrl: $baseUrl,
            options: $options
        );

        $this->casParser = new CasParserService($this);
        $this->casGenerator = new CasGeneratorService($this);
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
