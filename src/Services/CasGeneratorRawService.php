<?php

declare(strict_types=1);

namespace CasParser\Services;

use CasParser\Client;
use CasParser\ServiceContracts\CasGeneratorRawContract;

final class CasGeneratorRawService implements CasGeneratorRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
