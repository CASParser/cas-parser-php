<?php

namespace CasParser\Core\Errors;

class RateLimitError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'CasParser Rate Limit Error';
}
