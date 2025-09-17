<?php

declare(strict_types=1);

namespace App\Services\SmartEmailing\Api\Bag;

use App\Services\SmartEmailing\Api\src\Bag\AbstractBag;
use App\Services\SmartEmailing\Api\src\Model\General\FeedItem;

class FeedItemBag extends AbstractBag
{
    public function add(FeedItem $model): FeedItemBag
    {
        $this->insertEntry($model);
        return $this;
    }

    public function create(
        string $idItem,
        string $feedName,
        int    $quantity = 0,
    ): FeedItem
    {
        $model = new FeedItem($idItem, $feedName, $quantity);
        $this->add($model);
        return $model;
    }
}