<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing\Api\Search\General;

use Spawicki\SmartEmailing\Api\Search\AbstractSearch;

class SearchPurposes extends AbstractSearch
{
    public const string ID = 'id';
    public const string CREATED_AT = 'created_at';
    public const string LAWFUL_BASIS = 'lawful_basis';
    public const string NAME = 'name';
    public const string DURATION = 'duration';
    public const string NOTES = 'notes';

    protected function getSelectAllowedValues(): array
    {
        return [
            self::ID,
            self::CREATED_AT,
            self::LAWFUL_BASIS,
            self::NAME,
            self::DURATION,
            self::NOTES,
        ];
    }

    protected function getSortAllowedValues(): array
    {
        return [
            self::ID,
            self::CREATED_AT,
            self::LAWFUL_BASIS,
            self::NAME,
            self::NOTES,
        ];
    }
}