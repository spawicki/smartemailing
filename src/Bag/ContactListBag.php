<?php

declare(strict_types=1);

namespace App\Services\SmartEmailing\Api\src\Bag;

use App\Services\SmartEmailing\Api\src\Exception\AllowedTypeException;
use App\Services\SmartEmailing\Api\src\Model\Contact\ContactList;

class ContactListBag extends AbstractBag
{
    public function add(ContactList $model): ContactListBag
    {
        $this->insertEntry($model);
        return $this;
    }

    /**
     * @throws AllowedTypeException
     */
    public function create(
        int    $id,
        string $status,
    ): ContactList
    {
        $model = new ContactList($id, $status);
        $this->add($model);
        return $model;
    }
}