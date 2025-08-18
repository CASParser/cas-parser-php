<?php

namespace CasParser\Errors;

class InternalServerError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'CasParser Internal Server Error';
}
