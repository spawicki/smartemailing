<?php

declare(strict_types=1);

namespace App\Services\SmartEmailing\Api\src\Endpoint;

use App\Services\SmartEmailing\Api\src\Bag\OrderBag;
use App\Services\SmartEmailing\Api\src\Model\General\Order;
use App\Services\SmartEmailing\Api\src\Response\ImportResponse;
use App\Services\SmartEmailing\Api\src\Response\SmartEmailingResponseInterface;

/**
 * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-E_shops
 * @package SmartEmailing\Api
 */
class Eshops extends AbstractEndpoint
{
    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-E_shops-Add_or_update_order
     */
    public function createOrUpdateOrder(Order $order): SmartEmailingResponseInterface
    {
        $responseHttp = $this->post('orders', $order->toArray());
        return $this->buildResponse($responseHttp, ImportResponse::class);
    }

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-E_shops-Add_or_update_orders_in_bulk
     */
    public function importOrders(OrderBag $orderBag): ?SmartEmailingResponseInterface
    {
        if (!$orderBag->isEmpty()) {
            $originalOrders = $orderBag->getItems();
            $lastResponse = null;

            foreach (\array_chunk($originalOrders, $this->chunkLimit) as $orders) {
                $chunkOrderBag = new OrderBag()->setItems($orders);

                $responseHttp = $this->post('orders-bulk', $chunkOrderBag->toArray());
                $lastResponse = $this->buildResponse($responseHttp, ImportResponse::class);
            }

            return $lastResponse;
        }

        return null;
    }
}