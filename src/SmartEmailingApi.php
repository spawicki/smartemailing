<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing;

use Spawicki\SmartEmailing\Endpoint\Automation;
use Spawicki\SmartEmailing\Endpoint\ContactLists;
use Spawicki\SmartEmailing\Endpoint\Contacts;
use Spawicki\SmartEmailing\Endpoint\CustomCampaigns;
use Spawicki\SmartEmailing\Endpoint\CustomFieldOptions;
use Spawicki\SmartEmailing\Endpoint\CustomFields;
use Spawicki\SmartEmailing\Endpoint\Emails;
use Spawicki\SmartEmailing\Endpoint\Eshops;
use Spawicki\SmartEmailing\Endpoint\Import;
use Spawicki\SmartEmailing\Endpoint\Newsletter;
use Spawicki\SmartEmailing\Endpoint\ProcessingPurposes;
use Spawicki\SmartEmailing\Endpoint\Scoring;
use Spawicki\SmartEmailing\Endpoint\Stats;
use Spawicki\SmartEmailing\Endpoint\Tests;
use Spawicki\SmartEmailing\Endpoint\TransactionalEmails;
use Spawicki\SmartEmailing\Endpoint\WebForms;
use Spawicki\SmartEmailing\Endpoint\Webhooks;

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