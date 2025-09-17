<?php

declare(strict_types=1);

namespace App\Services\SmartEmailing\Api\src\Search\General;

class SearchCustomFieldOptions extends SearchSingleCustomFieldOptions
{
    protected function getSortAllowedValues(): array
    {
        return $this->getDefaultFields();
    }

    protected function getFilterAllowedValues(): array
    {
        return $this->getDefaultFields();
    }
}