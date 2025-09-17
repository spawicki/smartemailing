<?php

declare(strict_types=1);

namespace App\Services\SmartEmailing\Api\src\Endpoint;

use App\Services\SmartEmailing\Api\src\Model\General\Newsletter as NewsletterModel;
use App\Services\SmartEmailing\Api\src\Response\ImportResponse;
use App\Services\SmartEmailing\Api\src\Response\SmartEmailingResponseInterface;

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