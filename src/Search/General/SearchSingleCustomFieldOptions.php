<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing\Api\Search\General;

use Spawicki\SmartEmailing\Api\Search\AbstractSearch;

class SearchSingleCustomFieldOptions extends AbstractSearch
{
    public const string ID = 'id';
    public const string NAME = 'name';
    public const string ORDER = 'order';
    public const string CUSTOM_FIELD_ID = 'customfield_id';

    protected function getDefaultFields(): array
    {
        return [
            self::ID,
            self::NAME,
            self::ORDER,
            self::CUSTOM_FIELD_ID,
        ];
    }

    protected function getSelectAllowedValues(): array
    {
        return $this->getDefaultFields();
    }
}