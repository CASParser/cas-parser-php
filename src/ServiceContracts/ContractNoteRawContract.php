<?php

declare(strict_types=1);

namespace CasParser\ServiceContracts;

use CasParser\ContractNote\ContractNoteParseParams;
use CasParser\ContractNote\ContractNoteParseResponse;
use CasParser\Core\Contracts\BaseResponse;
use CasParser\Core\Exceptions\APIException;
use CasParser\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \CasParser\RequestOptions
 */
interface ContractNoteRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ContractNoteParseParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ContractNoteParseResponse>
     *
     * @throws APIException
     */
    public function parse(
        array|ContractNoteParseParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
