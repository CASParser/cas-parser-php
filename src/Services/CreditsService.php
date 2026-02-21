<?php

declare(strict_types=1);

namespace CasParser\Services;

use CasParser\Client;
use CasParser\ServiceContracts\CreditsContract;

final class CreditsService implements CreditsContract
{
    /**
     * @api
     */
    public CreditsRawService $raw;

    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CreditsRawService($client);
    }
}
