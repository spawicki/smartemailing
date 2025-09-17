<?php

declare(strict_types=1);

namespace App\Services\SmartEmailing\Api\src\Endpoint;

use App\Services\SmartEmailing\Api\src\Bag\TriggerEventBag;
use App\Services\SmartEmailing\Api\src\Response\BaseResponse;
use App\Services\SmartEmailing\Api\src\Response\SmartEmailingResponseInterface;

/**
 * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Automation
 * @package SmartEmailing\Api
 */
class Automation extends AbstractEndpoint
{
    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Automation-Trigger_event
     */
    public function triggerEvent(TriggerEventBag $triggerEventBag): ?SmartEmailingResponseInterface
    {
        if (!$triggerEventBag->isEmpty()) {
            $originalTriggers = $triggerEventBag->getItems();
            $lastResponse = null;

            foreach (\array_chunk($originalTriggers, $this->chunkLimit) as $triggers) {
                $chunkTriggerBag = new TriggerEventBag()->setItems($triggers);
                $responseHttp = $this->post('trigger-event', $chunkTriggerBag->toArray());
                $lastResponse = $this->buildResponse($responseHttp, BaseResponse::class);
            }

            return $lastResponse;
        }

        return null;
    }
}