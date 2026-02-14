<?php

namespace Tests\Services\Cdsl;

use CasParser\Cdsl\Fetch\FetchRequestOtpResponse;
use CasParser\Cdsl\Fetch\FetchVerifyOtpResponse;
use CasParser\Client;
use CasParser\Core\Util;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class FetchTest extends TestCase
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
    public function testRequestOtp(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cdsl->fetch->requestOtp(
            boID: '1234567890123456',
            dob: '1990-01-15',
            pan: 'ABCDE1234F'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FetchRequestOtpResponse::class, $result);
    }

    #[Test]
    public function testRequestOtpWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cdsl->fetch->requestOtp(
            boID: '1234567890123456',
            dob: '1990-01-15',
            pan: 'ABCDE1234F'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FetchRequestOtpResponse::class, $result);
    }

    #[Test]
    public function testVerifyOtp(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cdsl->fetch->verifyOtp(
            'session_id',
            otp: '123456'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FetchVerifyOtpResponse::class, $result);
    }

    #[Test]
    public function testVerifyOtpWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cdsl->fetch->verifyOtp(
            'session_id',
            otp: '123456',
            numPeriods: 6
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FetchVerifyOtpResponse::class, $result);
    }
}
