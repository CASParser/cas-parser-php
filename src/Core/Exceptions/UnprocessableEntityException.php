<?php

namespace CasParser\Core\Exceptions;

class UnprocessableEntityException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'CasParser Unprocessable Entity Exception';
}
