<?php

namespace CasParser\Core\Errors;

class InternalServerError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'CasParser Internal Server Error';
}
