<?php

declare(strict_types=1);

namespace CasParser\Services;

use CasParser\Client;
use CasParser\ServiceContracts\VerifyTokenContract;

final class VerifyTokenService implements VerifyTokenContract
{
    /**
     * @api
     */
    public VerifyTokenRawService $raw;

    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new VerifyTokenRawService($client);
    }
}
