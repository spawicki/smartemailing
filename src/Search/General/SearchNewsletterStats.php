<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing\Search\General;

use Spawicki\SmartEmailing\Search\AbstractSearch;

class SearchNewsletterStats extends AbstractSearch
{
    public const string ID = 'id';
    public const string EMAIL_ID = 'email_id';
    public const string SMS_ID = 'sms_id';
    public const string NAME = 'name';
    public const string SENT = 'sent';
    public const string OPENED = 'opened';
    public const string CLICKED = 'clicked';
    public const string UNSUBSCRIBE = 'unsubscribed';
    public const string BOUNCED = 'bounced';
    public const string UNOPENED = 'unopened';
    public const string UNOPENED_PERC = 'unopened_perc';
    public const string OPENED_PERC = 'opened_perc';
    public const string CLICKED_PERC = 'clicked_perc';
    public const string CLICKED_PERC_ABS = 'clicked_perc_abs';
    public const string UNSUBSCRIBE_PERC = 'unsubscribed_perc';
    public const string UNSUBSCRIBE_PERC_ABS = 'unsubscribed_perc_abs';
    public const string BOUNCED_PERC = 'bounced_perc';
    public const string START = 'start';
    public const string FINISH = 'finish';

    protected function getSelectAllowedValues(): array
    {
        return [
            self::ID,
            self::EMAIL_ID,
            self::SMS_ID,
            self::NAME,
            self::SENT,
            self::OPENED,
            self::CLICKED,
            self::UNSUBSCRIBE,
            self::BOUNCED,
            self::UNOPENED,
            self::UNOPENED_PERC,
            self::OPENED_PERC,
            self::CLICKED_PERC,
            self::CLICKED_PERC_ABS,
            self::UNSUBSCRIBE_PERC,
            self::UNSUBSCRIBE_PERC_ABS,
            self::BOUNCED_PERC,
            self::START,
            self::FINISH,
        ];
    }

    protected function getFilterAllowedValues(): array
    {
        return [
            self::ID,
            self::EMAIL_ID,
            self::SMS_ID,
            self::NAME,
        ];
    }
}