<?php

declare(strict_types=1);

namespace CasParser\Services;

use CasParser\Client;
use CasParser\ServiceContracts\AccessTokenRawContract;

final class AccessTokenRawService implements AccessTokenRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
