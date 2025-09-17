<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing\Endpoint;

use Spawicki\SmartEmailing\Bag\TaskBag;
use Spawicki\SmartEmailing\Model\AbstractModel;
use Spawicki\SmartEmailing\Model\General\CustomEmail;
use Spawicki\SmartEmailing\Model\General\Sms;
use Spawicki\SmartEmailing\Model\General\TransactionalEmail;
use Spawicki\SmartEmailing\Response\BaseResponse;
use Spawicki\SmartEmailing\Response\SmartEmailingResponseInterface;

class CustomCampaigns extends AbstractEndpoint
{
    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Custom_campaigns-Send_bulk_custom_SMS
     */
    public function smsBulk(Sms $sms): ?SmartEmailingResponseInterface
    {
        return $this->send('send/custom-sms-bulk', $sms, $this->chunkLimit);
    }

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Custom_campaigns-Send_bulk_custom_emails
     */
    public function emailBulk(CustomEmail $customEmail): ?SmartEmailingResponseInterface
    {
        return $this->send('send/custom-emails-bulk', $customEmail, $this->chunkLimit);
    }

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Custom_campaigns-Send_transactional_emails
     */
    public function sendTransactional(TransactionalEmail $transactionalEmail): ?SmartEmailingResponseInterface
    {
        return $this->send('send/transactional-emails-bulk', $transactionalEmail, 5);
    }

    protected function send(string $uri, AbstractModel $model, int $chunkLimit): ?SmartEmailingResponseInterface
    {
        /**
         * @var Sms|TransactionalEmail|CustomEmail $model
         */
        if (!$model->getTaskBag()->isEmpty()) {
            $originalItems = $model->getTaskBag()->getItems();
            $lastResponse = null;

            foreach (\array_chunk($originalItems, $chunkLimit) as $items) {
                /**
                 * @var Sms|TransactionalEmail|CustomEmail $chunkModel
                 */
                $chunkModel = clone $model;
                $taskBag = new TaskBag();
                $taskBag->setItems($items);
                $chunkModel->setTaskBag($taskBag);

                $responseHttp = $this->post($uri, $chunkModel->toArray());
                $lastResponse = $this->buildResponse($responseHttp, BaseResponse::class);
            }

            return $lastResponse;
        }

        return null;
    }
}