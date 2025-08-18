<?php

declare(strict_types=1);

namespace CasParser\Core\Concerns;

use CasParser\Core\BaseClient;
use CasParser\Core\Pagination\PageRequestOptions;
use Psr\Http\Message\ResponseInterface;

/**
 * @internal
 */
interface Page
{
    public function __construct(
        BaseClient $client,
        PageRequestOptions $options,
        ResponseInterface $response,
        mixed $body,
    );
}
