<?php

namespace CasParser\Core\Errors;

class PermissionDeniedError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'CasParser Permission Denied Error';
}
