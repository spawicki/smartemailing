<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing\Api\Bag;

use Spawicki\SmartEmailing\Api\Bag\AbstractBag;
use Spawicki\SmartEmailing\Api\Model\General\FeedItem;

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