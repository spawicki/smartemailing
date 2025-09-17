<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing\Api\Endpoint;

use Spawicki\SmartEmailing\Api\Response\BaseResponse;
use Spawicki\SmartEmailing\Api\Response\SmartEmailingResponseInterface;

/**
 * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Transactional_emails
 * @package SmartEmailing\Api
 */
class TransactionalEmails extends AbstractEndpoint
{
    const string URL_TRANSACTIONAL_EMAILS_IDS = 'transactional-emails-ids';

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Transactional_emails-Get_transactional_email_ids
     */
    public function getListCreated(): SmartEmailingResponseInterface
    {
        $responseHttp = $this->get(self::URL_TRANSACTIONAL_EMAILS_IDS);
        return $this->buildResponse($responseHttp, BaseResponse::class);
    }
}