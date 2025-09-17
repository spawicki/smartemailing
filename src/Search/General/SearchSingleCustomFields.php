<?php

declare(strict_types=1);

namespace App\Services\SmartEmailing\Api\src\Search\General;

use App\Services\SmartEmailing\Api\src\Search\AbstractSearch;

class SearchSingleCustomFields extends AbstractSearch
{
    public const string ID = 'id';
    public const string NAME = 'name';
    public const string TYPE = 'type';
    public const string CUSTOM_FIELD_OPTIONS = 'customfield_options';

    protected function getDefaultFields(): array
    {
        return [
            self::ID,
            self::NAME,
            self::TYPE,
        ];
    }

    protected function getSelectAllowedValues(): array
    {
        return $this->getDefaultFields();
    }
}