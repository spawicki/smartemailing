<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing\Endpoint;

use Spawicki\SmartEmailing\Model\General\Webhook;
use Spawicki\SmartEmailing\Response\BaseResponse;
use Spawicki\SmartEmailing\Response\SmartEmailingResponseInterface;
use Spawicki\SmartEmailing\Search\General\SearchWebhooks;

/**
 * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Webhooks
 * @package SmartEmailing\Api
 */
class Webhooks extends AbstractEndpoint
{
    const string URL_WEB_HOOKS = 'web-hooks';

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Webhooks-Creates_new_webhook
     */
    public function create(Webhook $webhook): SmartEmailingResponseInterface
    {
        $responseHttp = $this->post(self::URL_WEB_HOOKS, $webhook->toArray());
        return $this->buildResponse($responseHttp, BaseResponse::class);
    }

    /**
     * https://app.smartemailing.cz/docs/api/v3/index.html#api-Webhooks-Get_Webhooks
     */
    public function getList(?SearchWebhooks $search = null): SmartEmailingResponseInterface
    {
        $search ??= new SearchWebhooks();
        $responseHttp = $this->get(self::URL_WEB_HOOKS, $search->getAsQuery());
        return $this->buildResponse($responseHttp, BaseResponse::class);
    }

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Webhooks-Deletes_webhook
     */
    public function remove(int $idWebhook): SmartEmailingResponseInterface
    {
        $responseHttp = $this->delete(
            $this->replaceUrlParameters(
                self::URL_WEB_HOOKS . '/:id',
                [
                    'id' => $idWebhook,
                ]
            )
        );
        return $this->buildResponse($responseHttp, BaseResponse::class);
    }
}