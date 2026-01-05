<?php

declare(strict_types=1);

namespace CasParser\Services;

use CasParser\Client;
use CasParser\ServiceContracts\CasGeneratorContract;

final class CasGeneratorService implements CasGeneratorContract
{
    /**
     * @api
     */
    public CasGeneratorRawService $raw;

    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CasGeneratorRawService($client);
    }
}
