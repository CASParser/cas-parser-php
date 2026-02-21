<?php

declare(strict_types=1);

namespace CasParser\Services;

use CasParser\Client;
use CasParser\ServiceContracts\LogsContract;

final class LogsService implements LogsContract
{
    /**
     * @api
     */
    public LogsRawService $raw;

    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new LogsRawService($client);
    }
}
