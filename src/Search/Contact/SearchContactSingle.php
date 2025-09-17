<?php

declare(strict_types=1);

namespace App\Services\SmartEmailing\Api\src\Search\Contact;

use App\Services\SmartEmailing\Api\src\Search\AbstractSearch;

class SearchContactSingle extends AbstractSearch
{
    public const string ID = 'id';
    public const string LANGUAGE = 'language';
    public const string BLACKLISTED = 'blacklisted';
    public const string EMAIL_ADDRESS = 'emailaddress';
    public const string NAME = 'name';
    public const string SURNAME = 'surname';
    public const string TITLES_BEFORE = 'titlesbefore';
    public const string TITLES_AFTER = 'titlesafter';
    public const string BIRTHDAY = 'birthday';
    public const string NAME_DAY = 'nameday';
    public const string POSTAL_CODE = 'postalcode';
    public const string NOTES = 'notes';
    public const string PHONE = 'phone';
    public const string CELLPHONE = 'cellphone';
    public const string REAL_NAME = 'realname';
    public const string CUSTOM_FIELDS = 'customfields';

    protected function getDefaultFields(): array
    {
        return [
            self::ID,
            self::LANGUAGE,
            self::BLACKLISTED,
            self::EMAIL_ADDRESS,
            self::NAME,
            self::SURNAME,
            self::TITLES_BEFORE,
            self::TITLES_AFTER,
            self::BIRTHDAY,
            self::NAME_DAY,
            self::POSTAL_CODE,
            self::NOTES,
            self::PHONE,
            self::CELLPHONE,
            self::REAL_NAME,
        ];
    }

    protected function getSelectAllowedValues(): array
    {
        return $this->getDefaultFields();
    }
}