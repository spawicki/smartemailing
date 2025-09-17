<?php

declare(strict_types=1);

namespace App\Services\SmartEmailing\Api\src\Search\General;

use App\Services\SmartEmailing\Api\src\Search\AbstractSearch;

class SearchCampaignStats extends AbstractSearch
{
    public const string CAMPAIGN_NEWSLETTER = 'newsletter';
    public const string CAMPAIGN_AUTORESPONDER = 'autoresponder';
    public const string CAMPAIGN_CUSTOM_EMAIL = 'custom_email';
    public const string CAMPAIGN_TRIGGER_ACTION = 'trigger_action';
    public const string CAMPAIGN_TRANSACTIONAL_EMAIL = 'transactional_email';

    public const string ID = 'id';
    public const string CAMPAIGN_ID = 'campaign_id';
    public const string CONTACT_ID = 'contact_id';
    public const string OPENED = 'opened';
    public const string CLICKED = 'clicked';
    public const string UNSUBSCRIBE = 'unsubscribed';
    public const string BOUNCED = 'bounced';
    public const string TIME = 'time';
    public const string EMAIL_ADDRESS = 'emailaddress';

    protected function getDefaultFields(): array
    {
        return [
            self::ID,
            self::CAMPAIGN_ID,
            self::CONTACT_ID,
            self::OPENED,
            self::CLICKED,
            self::UNSUBSCRIBE,
            self::BOUNCED,
            self::TIME,
            self::EMAIL_ADDRESS,
        ];
    }

    protected function getSelectAllowedValues(): array
    {
        return $this->getDefaultFields();
    }

    protected function getActionTypeAllowedValues(): array
    {
        return [
            self::CAMPAIGN_NEWSLETTER,
            self::CAMPAIGN_AUTORESPONDER,
            self::CAMPAIGN_CUSTOM_EMAIL,
            self::CAMPAIGN_TRIGGER_ACTION,
            self::CAMPAIGN_TRANSACTIONAL_EMAIL,
        ];
    }

    protected function getFilterAllowedValues(): array
    {
        return $this->getDefaultFields();
    }
}