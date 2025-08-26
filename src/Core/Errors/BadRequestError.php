<?php

namespace CasParser\Core\Errors;

class BadRequestError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'CasParser Bad Request Error';
}
