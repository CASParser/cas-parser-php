<?php

namespace CasParser\Core\Exceptions;

class InternalServerException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'CasParser Internal Server Exception';
}
