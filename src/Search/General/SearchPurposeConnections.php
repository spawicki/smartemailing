<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing\Search\General;

use Spawicki\SmartEmailing\Search\AbstractSearch;

class SearchPurposeConnections extends AbstractSearch
{
    public const string ID = 'id';
    public const string CREATED_AT = 'created_at';
    public const string CONTACT_ID = 'contact_id';
    public const string VALID_FROM = 'valid_from';
    public const string VALID_TO = 'valid_to';
    public const string PURPOSE_ID = 'purpose_id';
    public const string DETAILS = 'details';

    protected function getDefaultFields(): array
    {
        return [
            self::ID,
            self::CREATED_AT,
            self::CONTACT_ID,
            self::VALID_FROM,
            self::VALID_TO,
            self::PURPOSE_ID,
            self::DETAILS,
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

    protected function getSortAllowedValues(): array
    {
        return [
            self::ID,
            self::CREATED_AT,
            self::CONTACT_ID,
            self::VALID_FROM,
            self::VALID_TO,
            self::PURPOSE_ID,
        ];
    }
}