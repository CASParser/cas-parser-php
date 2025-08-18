<?php

namespace CasParser\Errors;

class ConflictError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'CasParser Conflict Error';
}
