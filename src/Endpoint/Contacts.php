<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing\Api\Endpoint;

use Spawicki\SmartEmailing\Api\Model\Contact\ContactChangeEmailAddress;
use Spawicki\SmartEmailing\Api\Response\BaseResponse;
use Spawicki\SmartEmailing\Api\Response\SmartEmailingResponseInterface;
use Spawicki\SmartEmailing\Api\Search\Contact\SearchContact;
use Spawicki\SmartEmailing\Api\Search\Contact\SearchContactSingle;

class Contacts extends AbstractEndpoint
{
    const string URL_CONTACTS = 'contacts';

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Contacts-Change_Contacts_e_mail_address
     */
    public function changeEmailAddress(ContactChangeEmailAddress $changeEmailAddress): SmartEmailingResponseInterface
    {
        $responseHttp = $this->post('change-emailaddress', $changeEmailAddress->toArray());
        return $this->buildResponse($responseHttp, BaseResponse::class);
    }

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Contacts-Forget_contact
     */
    public function forgetContact(int $idContact): SmartEmailingResponseInterface
    {
        $responseHttp = $this->delete(
            $this->replaceUrlParameters(
                self::URL_CONTACTS . '/forget/:id',
                [
                    'id' => $idContact,
                ]
            )
        );
        return $this->buildResponse($responseHttp, BaseResponse::class);
    }

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Contacts-Get_Contacts_with_lists_and_customfield_values
     */
    public function getList(?SearchContact $search = null): SmartEmailingResponseInterface
    {
        $search ??= new SearchContact();
        $responseHttp = $this->get(self::URL_CONTACTS, $search->getAsQuery());
        return $this->buildResponse($responseHttp, BaseResponse::class);
    }

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Contacts-Get_Single_contact_with_lists_and_customfield_values
     */
    public function getSingle(int $idContact, ?SearchContactSingle $search = null): SmartEmailingResponseInterface
    {
        $search ??= new SearchContactSingle();
        $responseHttp = $this->get(
            $this->replaceUrlParameters(
                self::URL_CONTACTS . '/:id',
                [
                    'id' => $idContact,
                ]
            ),
            $search->getAsQuery()
        );
        return $this->buildResponse($responseHttp, BaseResponse::class);
    }
}