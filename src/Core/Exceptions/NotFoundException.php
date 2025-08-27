<?php

namespace CasParser\Core\Exceptions;

class NotFoundException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'CasParser Not Found Exception';
}
