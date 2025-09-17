<?php

declare(strict_types=1);

namespace App\Services\SmartEmailing\Api\src\Search\General;

class SearchEmails extends SearchSingleEmail
{
    public function __construct()
    {
        $this->setLimit(10);
    }

    protected function getSortAllowedValues(): array
    {
        return $this->getDefaultFields();
    }
}