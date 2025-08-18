<?php

namespace Tests\Resources;

use CasParser\CasParser\CasParserCamsKfintechParams;
use CasParser\CasParser\CasParserCdslParams;
use CasParser\CasParser\CasParserNsdlParams;
use CasParser\CasParser\CasParserSmartParseParams;
use CasParser\Client;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class CasParserTest extends TestCase
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
    public function testCamsKfintech(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $params = (new CasParserCamsKfintechParams);
        $result = $this->client->casParser->camsKfintech($params);

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testCdsl(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $params = (new CasParserCdslParams);
        $result = $this->client->casParser->cdsl($params);

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testNsdl(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $params = (new CasParserNsdlParams);
        $result = $this->client->casParser->nsdl($params);

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testSmartParse(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $params = (new CasParserSmartParseParams);
        $result = $this->client->casParser->smartParse($params);

        $this->assertTrue(true); // @phpstan-ignore-line
    }
}
