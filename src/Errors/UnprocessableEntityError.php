<?php

namespace CasParser\Errors;

class UnprocessableEntityError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'CasParser Unprocessable Entity Error';
}
