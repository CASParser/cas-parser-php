<?php

declare(strict_types=1);

namespace CasParser\Services;

use CasParser\Client;
use CasParser\ServiceContracts\KfintechContract;

final class KfintechService implements KfintechContract
{
    /**
     * @api
     */
    public KfintechRawService $raw;

    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new KfintechRawService($client);
    }
}
