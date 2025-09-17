<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing\Api;

use Spawicki\SmartEmailing\Api\Endpoint\Automation;
use Spawicki\SmartEmailing\Api\Endpoint\ContactLists;
use Spawicki\SmartEmailing\Api\Endpoint\Contacts;
use Spawicki\SmartEmailing\Api\Endpoint\CustomCampaigns;
use Spawicki\SmartEmailing\Api\Endpoint\CustomFieldOptions;
use Spawicki\SmartEmailing\Api\Endpoint\CustomFields;
use Spawicki\SmartEmailing\Api\Endpoint\Emails;
use Spawicki\SmartEmailing\Api\Endpoint\Eshops;
use Spawicki\SmartEmailing\Api\Endpoint\Import;
use Spawicki\SmartEmailing\Api\Endpoint\Newsletter;
use Spawicki\SmartEmailing\Api\Endpoint\ProcessingPurposes;
use Spawicki\SmartEmailing\Api\Endpoint\Scoring;
use Spawicki\SmartEmailing\Api\Endpoint\Stats;
use Spawicki\SmartEmailing\Api\Endpoint\Tests;
use Spawicki\SmartEmailing\Api\Endpoint\TransactionalEmails;
use Spawicki\SmartEmailing\Api\Endpoint\WebForms;
use Spawicki\SmartEmailing\Api\Endpoint\Webhooks;

class SmartEmailingApi extends AbstractApi
{

    public function automation(): Automation
    {
        return new Automation($this);
    }

    public function contactLists(): ContactLists
    {
        return new ContactLists($this);
    }

    public function contacts(): Contacts
    {
        return new Contacts($this);
    }

    public function customCampaigns(): CustomCampaigns
    {
        return new CustomCampaigns($this);
    }

    public function customFieldOptions(): CustomFieldOptions
    {
        return new CustomFieldOptions($this);
    }

    public function customFields(): CustomFields
    {
        return new CustomFields($this);
    }

    public function emails(): Emails
    {
        return new Emails($this);
    }

    public function eshops(): Eshops
    {
        return new Eshops($this);
    }

    public function import(): Import
    {
        return new Import($this);
    }

    public function newsletter(): Newsletter
    {
        return new Newsletter($this);
    }

    public function processingPurposes(): ProcessingPurposes
    {
        return new ProcessingPurposes($this);
    }

    public function scoring(): Scoring
    {
        return new Scoring($this);
    }

    public function stats(): Stats
    {
        return new Stats($this);
    }

    public function tests(): Tests
    {
        return new Tests($this);
    }

    public function transactionalEmails(): TransactionalEmails
    {
        return new TransactionalEmails($this);
    }

    public function webForms(): WebForms
    {
        return new WebForms($this);
    }

    public function webhooks(): Webhooks
    {
        return new Webhooks($this);
    }

}