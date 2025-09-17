<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing\Api\Bag;

use Spawicki\SmartEmailing\Api\Exception\AllowedTypeException;
use Spawicki\SmartEmailing\Api\Model\Contact\ContactList;

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