<?php

namespace Tests\Services;

use CasParser\Client;
use CasParser\Core\Util;
use CasParser\Kfintech\KfintechGenerateCasResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class KfintechTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiKey: 'My API Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testGenerateCas(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->kfintech->generateCas(
            email: 'user@example.com',
            fromDate: '2023-01-01',
            password: 'Abcdefghi12$',
            toDate: '2023-12-31',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(KfintechGenerateCasResponse::class, $result);
    }

    #[Test]
    public function testGenerateCasWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->kfintech->generateCas(
            email: 'user@example.com',
            fromDate: '2023-01-01',
            password: 'Abcdefghi12$',
            toDate: '2023-12-31',
            panNo: 'ABCDE1234F',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(KfintechGenerateCasResponse::class, $result);
    }
}
