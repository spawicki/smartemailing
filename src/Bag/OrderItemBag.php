<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing\Api\Bag;

use Spawicki\SmartEmailing\Api\Model\General\OrderItem;
use Spawicki\SmartEmailing\Api\Model\General\Price;

class OrderItemBag extends AbstractBag
{
    public function add(OrderItem $model): OrderItemBag
    {
        $this->insertEntry($model);
        return $this;
    }

    public function create(
        string $id,
        string $name,
        Price  $price,
        int    $quantity,
        string $url,
    ): OrderItem
    {
        $model = new OrderItem($id, $name, $price, $quantity, $url);
        $this->add($model);
        return $model;
    }
}