<?php

declare(strict_types=1);

namespace App\Services\SmartEmailing\Api\src\Bag;

use App\Services\SmartEmailing\Api\src\Model\Contact\ContactDetail;

class ContactBag extends AbstractBag
{
    public function add(ContactDetail $model): ContactBag
    {
        $this->insertEntry($model);
        return $this;
    }

    public function create(
        string $emailAddress,
    ): ContactDetail
    {
        $model = (new ContactDetail($emailAddress));
        $this->add($model);
        return $model;
    }
}