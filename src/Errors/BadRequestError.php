<?php

namespace CasParser\Errors;

class BadRequestError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'CasParser Bad Request Error';
}
