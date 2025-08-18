<?php

namespace CasParser\Errors;

class NotFoundError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'CasParser Not Found Error';
}
