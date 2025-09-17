<?php

declare(strict_types=1);

namespace App\Services\SmartEmailing\Api\src\Bag;

use App\Services\SmartEmailing\Api\src\Model\General\Order;

class OrderBag extends AbstractBag
{
    public function add(Order $model): OrderBag
    {
        $this->insertEntry($model);
        return $this;
    }

    public function create(
        string $emailAddress,
        string $eshopName,
        string $eshopCode,
    ): Order
    {
        $model = new Order($emailAddress, $eshopName, $eshopCode);
        $this->add($model);
        return $model;
    }
}