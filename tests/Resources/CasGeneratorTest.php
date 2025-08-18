<?php

namespace Tests\Resources;

use CasParser\CasGenerator\CasGeneratorGenerateCasParams;
use CasParser\Client;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class CasGeneratorTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiKey: 'My API Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testGenerateCas(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $params = CasGeneratorGenerateCasParams::with(
            email: 'user@example.com',
            fromDate: '2023-01-01',
            password: 'Abcdefghi12$',
            toDate: '2023-12-31',
        );
        $result = $this->client->casGenerator->generateCas($params);

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testGenerateCasWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $params = CasGeneratorGenerateCasParams::with(
            email: 'user@example.com',
            fromDate: '2023-01-01',
            password: 'Abcdefghi12$',
            toDate: '2023-12-31',
            casAuthority: 'kfintech',
            panNo: 'ABCDE1234F',
        );
        $result = $this->client->casGenerator->generateCas($params);

        $this->assertTrue(true); // @phpstan-ignore-line
    }
}
