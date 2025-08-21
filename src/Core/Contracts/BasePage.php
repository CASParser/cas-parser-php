<?php

declare(strict_types=1);

namespace CasParser\Core\Contracts;

use CasParser\Core\BaseClient;
use CasParser\Core\Pagination\PageRequestOptions;
use Psr\Http\Message\ResponseInterface;

/**
 * @internal
 */
interface BasePage
{
    public function __construct(
        BaseClient $client,
        PageRequestOptions $options,
        ResponseInterface $response,
        mixed $body,
    );
}
