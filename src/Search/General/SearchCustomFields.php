<?php

declare(strict_types=1);

namespace App\Services\SmartEmailing\Api\src\Search\General;

class SearchCustomFields extends SearchSingleCustomFields
{
    protected function getSortAllowedValues(): array
    {
        return $this->getDefaultFields();
    }

    protected function getFilterAllowedValues(): array
    {
        return $this->getDefaultFields();
    }

    protected function getExpandAllowedValues(): array
    {
        return [
            self::CUSTOM_FIELD_OPTIONS,
        ];
    }
}