<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing\Api\Model\Import;

use Spawicki\SmartEmailing\Api\Bag\ContactBag;
use Spawicki\SmartEmailing\Api\Model\AbstractModel;
use Spawicki\SmartEmailing\Api\Model\Contact\Settings\Settings;

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