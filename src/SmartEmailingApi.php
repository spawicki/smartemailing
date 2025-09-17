<?php

declare(strict_types=1);

namespace App\Services\SmartEmailing\Api\src;

use App\Services\SmartEmailing\Api\src\Endpoint\Automation;
use App\Services\SmartEmailing\Api\src\Endpoint\ContactLists;
use App\Services\SmartEmailing\Api\src\Endpoint\Contacts;
use App\Services\SmartEmailing\Api\src\Endpoint\CustomCampaigns;
use App\Services\SmartEmailing\Api\src\Endpoint\CustomFieldOptions;
use App\Services\SmartEmailing\Api\src\Endpoint\CustomFields;
use App\Services\SmartEmailing\Api\src\Endpoint\Emails;
use App\Services\SmartEmailing\Api\src\Endpoint\Eshops;
use App\Services\SmartEmailing\Api\src\Endpoint\Import;
use App\Services\SmartEmailing\Api\src\Endpoint\Newsletter;
use App\Services\SmartEmailing\Api\src\Endpoint\ProcessingPurposes;
use App\Services\SmartEmailing\Api\src\Endpoint\Scoring;
use App\Services\SmartEmailing\Api\src\Endpoint\Stats;
use App\Services\SmartEmailing\Api\src\Endpoint\Tests;
use App\Services\SmartEmailing\Api\src\Endpoint\TransactionalEmails;
use App\Services\SmartEmailing\Api\src\Endpoint\WebForms;
use App\Services\SmartEmailing\Api\src\Endpoint\Webhooks;

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