<?php

namespace CasParser\Core\Exceptions;

class BadRequestException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'CasParser Bad Request Exception';
}
