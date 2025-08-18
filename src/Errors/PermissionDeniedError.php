<?php

namespace CasParser\Errors;

class PermissionDeniedError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'CasParser Permission Denied Error';
}
