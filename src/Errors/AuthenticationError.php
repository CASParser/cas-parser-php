<?php

namespace CasParser\Errors;

class AuthenticationError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'CasParser Authentication Error';
}
