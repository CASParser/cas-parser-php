<?php

namespace Tests\Services;

use CasParser\Client;
use CasParser\Core\Util;
use CasParser\Inbox\InboxCheckConnectionStatusResponse;
use CasParser\Inbox\InboxConnectEmailResponse;
use CasParser\Inbox\InboxDisconnectEmailResponse;
use CasParser\Inbox\InboxListCasFilesResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class InboxTest extends TestCase
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
    public function testCheckConnectionStatus(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->inbox->checkConnectionStatus(
            xInboxToken: 'x-inbox-token'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(InboxCheckConnectionStatusResponse::class, $result);
    }

    #[Test]
    public function testCheckConnectionStatusWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->inbox->checkConnectionStatus(
            xInboxToken: 'x-inbox-token'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(InboxCheckConnectionStatusResponse::class, $result);
    }

    #[Test]
    public function testConnectEmail(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->inbox->connectEmail(
            redirectUri: 'https://yourapp.com/oauth-callback'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(InboxConnectEmailResponse::class, $result);
    }

    #[Test]
    public function testConnectEmailWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->inbox->connectEmail(
            redirectUri: 'https://yourapp.com/oauth-callback',
            state: 'abc123'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(InboxConnectEmailResponse::class, $result);
    }

    #[Test]
    public function testDisconnectEmail(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->inbox->disconnectEmail(
            xInboxToken: 'x-inbox-token'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(InboxDisconnectEmailResponse::class, $result);
    }

    #[Test]
    public function testDisconnectEmailWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->inbox->disconnectEmail(
            xInboxToken: 'x-inbox-token'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(InboxDisconnectEmailResponse::class, $result);
    }

    #[Test]
    public function testListCasFiles(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->inbox->listCasFiles(xInboxToken: 'x-inbox-token');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(InboxListCasFilesResponse::class, $result);
    }

    #[Test]
    public function testListCasFilesWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->inbox->listCasFiles(
            xInboxToken: 'x-inbox-token',
            casTypes: ['cdsl', 'nsdl'],
            endDate: '2025-12-31',
            startDate: '2025-12-01',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(InboxListCasFilesResponse::class, $result);
    }
}
