<?php

namespace CasParser\Core\Exceptions;

class PermissionDeniedException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'CasParser Permission Denied Exception';
}
