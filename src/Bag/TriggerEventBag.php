<?php

declare(strict_types=1);

namespace App\Services\SmartEmailing\Api\src\Bag;

use App\Services\SmartEmailing\Api\src\Model\General\Event;

class TriggerEventBag extends AbstractBag
{
    public function add(Event $model): TriggerEventBag
    {
        $this->insertEntry($model);
        return $this;
    }

    public function create(
        string $emailAddress,
        string $name,
        array  $payload = [],
    ): Event
    {
        $model = new Event($emailAddress, $name, $payload);
        $this->add($model);
        return $model;
    }
}