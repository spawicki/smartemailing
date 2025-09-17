<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing\Search\ContactList;

use Spawicki\SmartEmailing\Search\AbstractSearch;

class SearchContactList extends AbstractSearch
{
    public const string ID = 'id';
    public const string NAME = 'name';
    public const string CATEGORY = 'category';
    public const string PUBLIC_NAME = 'publicname';
    public const string SENDER_NAME = 'sendername';
    public const string SENDER_EMAIL = 'senderemail';
    public const string REPLY_TO = 'replyto';
    public const string SIGNATURE = 'signature';
    public const string SEGMENT_ID = 'segment_id';

    protected function getSelectAllowedValues(): array
    {
        return [
            self::ID,
            self::NAME,
            self::CATEGORY,
            self::PUBLIC_NAME,
            self::SENDER_NAME,
            self::SENDER_EMAIL,
            self::REPLY_TO,
            self::SIGNATURE,
            self::SEGMENT_ID,
        ];
    }
}