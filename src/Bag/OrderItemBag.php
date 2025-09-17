<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing\Bag;

use Spawicki\SmartEmailing\Model\General\OrderItem;
use Spawicki\SmartEmailing\Model\General\Price;

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