<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing\Api\Search\General;

use Spawicki\SmartEmailing\Api\Search\AbstractSearch;

class SearchContactCustomFields extends AbstractSearch
{
    public const string ID = 'id';
    public const string CONTACT_ID = 'contact_id';
    public const string CUSTOM_FIELD_ID = 'customfield_id';
    public const string VALUE = 'value';
    public const string CUSTOM_FIELD_OPTIONS_ID = 'customfield_options_id';

    protected function getDefaultFields(): array
    {
        return [
            self::ID,
            self::CONTACT_ID,
            self::CUSTOM_FIELD_ID,
            self::VALUE,
            self::CUSTOM_FIELD_OPTIONS_ID,
        ];
    }

    protected function getSelectAllowedValues(): array
    {
        return $this->getDefaultFields();
    }

    protected function getSortAllowedValues(): array
    {
        return $this->getDefaultFields();
    }

    protected function getFilterAllowedValues(): array
    {
        return $this->getDefaultFields();
    }
}