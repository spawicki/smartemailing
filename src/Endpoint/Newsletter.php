<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing\Api\Endpoint;

use Spawicki\SmartEmailing\Api\Model\General\Newsletter as NewsletterModel;
use Spawicki\SmartEmailing\Api\Response\ImportResponse;
use Spawicki\SmartEmailing\Api\Response\SmartEmailingResponseInterface;

/**
 * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Newsletter
 * @package SmartEmailing\Api
 */
class Newsletter extends AbstractEndpoint
{
    const string URL_NEWSLETTER = 'newsletter';

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Newsletter-Create_newsletter
     */
    public function create(NewsletterModel $newsletter): SmartEmailingResponseInterface
    {
        $responseHttp = $this->post(self::URL_NEWSLETTER, $newsletter->toArray());
        return $this->buildResponse($responseHttp, ImportResponse::class);
    }
}