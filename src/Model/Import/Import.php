<?php

declare(strict_types=1);

namespace App\Services\SmartEmailing\Api\src\Model\Import;

use App\Services\SmartEmailing\Api\src\Bag\ContactBag;
use App\Services\SmartEmailing\Api\src\Model\AbstractModel;
use App\Services\SmartEmailing\Api\src\Model\Contact\Settings\Settings;

class Import extends AbstractModel
{
    protected ContactBag $contactBag;
    protected ?Settings $settings;

    public function __construct(ContactBag $contactBag, ?Settings $settings = null)
    {
        $this->setContactBag($contactBag);
        $this->setSettings($settings);
    }

    public function getSettings(): ?Settings
    {
        return $this->settings;
    }

    public function setSettings(?Settings $settings): static
    {
        $this->settings = $settings;
        return $this;
    }

    public function getContactBag(): ContactBag
    {
        return $this->contactBag;
    }

    public function setContactBag(ContactBag $contactBag): static
    {
        $this->contactBag = $contactBag;
        return $this;
    }

    public function toArray(): array
    {
        return array_filter(
            [
                'settings' => $this->getSettings()->toArray(),
                'data' => $this->getContactBag()->toArray(),
            ],
            static fn($item) => !\is_null($item)
        );
    }
}