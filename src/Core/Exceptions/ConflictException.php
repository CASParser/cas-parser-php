<?php

namespace CasParser\Core\Exceptions;

class ConflictException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'CasParser Conflict Exception';
}
