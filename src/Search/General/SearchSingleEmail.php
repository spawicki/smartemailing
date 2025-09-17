<?php

declare(strict_types=1);

namespace App\Services\SmartEmailing\Api\src\Search\General;

use App\Services\SmartEmailing\Api\src\Search\AbstractSearch;

class SearchSingleEmail extends AbstractSearch
{
    public const string ID = 'id';
    public const string NAME = 'name';
    public const string TITLE = 'surname';
    public const string HTML_BODY = 'htmlbody';
    public const string TEXT_BODY = 'textbody';
    public const string CREATED = 'created';

    protected function getDefaultFields(): array
    {
        return [
            self::ID,
            self::NAME,
            self::TITLE,
            self::HTML_BODY,
            self::TEXT_BODY,
            self::CREATED,
        ];
    }

    protected function getSelectAllowedValues(): array
    {
        return $this->getDefaultFields();
    }
}