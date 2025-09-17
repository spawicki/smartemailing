<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing\Endpoint;

use Spawicki\SmartEmailing\Model\General\Email;
use Spawicki\SmartEmailing\Model\General\EmailTemplate;
use Spawicki\SmartEmailing\Response\BaseResponse;
use Spawicki\SmartEmailing\Response\SmartEmailingResponseInterface;
use Spawicki\SmartEmailing\Search\General\SearchEmails;
use Spawicki\SmartEmailing\Search\General\SearchSingleEmail;

/**
 * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Emails
 * @package SmartEmailing\Api
 */
class Emails extends AbstractEndpoint
{
    const string URL_EMAILS = 'emails';
    const string URL_CONFIRMATION_EMAILS = 'confirmation-emails';

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Emails-Create_e_mail_from_template
     */
    public function createFromTemplate(EmailTemplate $emailTemplate): SmartEmailingResponseInterface
    {
        $responseHttp = $this->post(self::URL_EMAILS . '/create-from-template', $emailTemplate->toArray());
        return $this->buildResponse($responseHttp, BaseResponse::class);
    }

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Emails-Create_new_E_mail
     */
    public function create(Email $email): SmartEmailingResponseInterface
    {
        $responseHttp = $this->post(self::URL_EMAILS, $email->toArray());
        return $this->buildResponse($responseHttp, BaseResponse::class);
    }

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Emails-Get_E_mails
     */
    public function getList(?SearchEmails $search = null): SmartEmailingResponseInterface
    {
        $search ??= new SearchEmails();
        $responseHttp = $this->get(self::URL_EMAILS, $search->getAsQuery());
        return $this->buildResponse($responseHttp, BaseResponse::class);
    }

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Emails-Get_confirmation_emails
     */
    public function getConfirmationList(?SearchEmails $search = null): SmartEmailingResponseInterface
    {
        $search ??= new SearchEmails();
        $responseHttp = $this->get(self::URL_CONFIRMATION_EMAILS, $search->getAsQuery());
        return $this->buildResponse($responseHttp, BaseResponse::class);
    }

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Emails-Get_single_E_mail
     */
    public function getSingle(int $idEmail, ?SearchSingleEmail $search = null): SmartEmailingResponseInterface
    {
        $search ??= new SearchSingleEmail();
        $responseHttp = $this->get(
            $this->replaceUrlParameters(
                self::URL_EMAILS . '/:id',
                [
                    'id' => $idEmail,
                ]
            ),
            $search->getAsQuery()
        );
        return $this->buildResponse($responseHttp, BaseResponse::class);

    }
}