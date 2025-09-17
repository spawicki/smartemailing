<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing\Api\Search\General;

use Spawicki\SmartEmailing\Api\Search\AbstractSearch;

class SearchWebhooks extends AbstractSearch
{
    public const string ID = 'id';
    public const string URL = 'url';
    public const string METHOD = 'method';
    public const string EVENT = 'event';
    public const string ACTIVE = 'active';
    public const string TIMEOUT = 'timeout';
    public const string LAST_RESPONSE_CODE = 'last_response_code';
    public const string LAST_CALL_TIME = 'last_call_time';
    public const string ERRORS_IN_ROW = 'errors_in_row';

    protected function getDefaultFields(): array
    {
        return [
            self::ID,
            self::URL,
            self::METHOD,
            self::EVENT,
            self::ACTIVE,
            self::TIMEOUT,
            self::LAST_RESPONSE_CODE,
            self::LAST_CALL_TIME,
            self::ERRORS_IN_ROW,
        ];
    }

    protected function getSelectAllowedValues(): array
    {
        return $this->getDefaultFields();
    }

    protected function getFilterAllowedValues(): array
    {
        return $this->getDefaultFields();
    }
}