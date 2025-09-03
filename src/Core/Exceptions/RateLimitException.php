<?php

namespace CasParser\Core\Exceptions;

class RateLimitException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'CasParser Rate Limit Exception';
}
