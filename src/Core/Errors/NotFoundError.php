<?php

namespace CasParser\Core\Errors;

class NotFoundError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'CasParser Not Found Error';
}
