<?php

declare(strict_types=1);

namespace CasParser\Services;

use CasParser\Client;
use CasParser\ServiceContracts\AccessTokenContract;

final class AccessTokenService implements AccessTokenContract
{
    /**
     * @api
     */
    public AccessTokenRawService $raw;

    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AccessTokenRawService($client);
    }
}
