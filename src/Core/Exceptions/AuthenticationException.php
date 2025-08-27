<?php

namespace CasParser\Core\Exceptions;

class AuthenticationException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'CasParser Authentication Exception';
}
