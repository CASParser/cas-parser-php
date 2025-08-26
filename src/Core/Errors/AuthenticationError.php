<?php

namespace CasParser\Core\Errors;

class AuthenticationError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'CasParser Authentication Error';
}
