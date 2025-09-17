<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing\Api\Endpoint;

use Spawicki\SmartEmailing\Api\Exception\RequiredFieldException;
use Spawicki\SmartEmailing\Api\Model\ContactList\ContactList;
use Spawicki\SmartEmailing\Api\Model\ContactList\ContactListNew;
use Spawicki\SmartEmailing\Api\Response\BaseResponse;
use Spawicki\SmartEmailing\Api\Response\SmartEmailingResponseInterface;
use Spawicki\SmartEmailing\Api\Search\ContactList\SearchContactList;

/**
 * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Contactlists
 * @package SmartEmailing\Api
 */
class ContactLists extends AbstractEndpoint
{
    const string URL_CONTACT_LISTS = 'contactlists';

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Contactlists-Count_added_contacts_in_list
     */
    public function getAddedContacts(int $idContactList): SmartEmailingResponseInterface
    {
        $responseHttp = $this->get(
            $this->replaceUrlParameters(
                self::URL_CONTACT_LISTS . '/:id/added-contacts',
                [
                    'id' => $idContactList,
                ]
            )
        );
        return $this->buildResponse($responseHttp, BaseResponse::class);
    }

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Contactlists-Create_new_Contactlist
     * @throws RequiredFieldException
     */
    public function create(ContactListNew $contactList): SmartEmailingResponseInterface
    {
        $responseHttp = $this->post(self::URL_CONTACT_LISTS, $contactList->toArray());
        return $this->buildResponse($responseHttp, BaseResponse::class);
    }

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Contactlists-Count_contacts_in_list
     */
    public function getDistribution(int $idContactList): SmartEmailingResponseInterface
    {
        $responseHttp = $this->get(
            $this->replaceUrlParameters(
                self::URL_CONTACT_LISTS . '/:id/distribution',
                [
                    'id' => $idContactList,
                ]
            )
        );
        return $this->buildResponse($responseHttp, BaseResponse::class);
    }

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Contactlists-Get_Contactlists
     */
    public function getList(?SearchContactList $search = null): SmartEmailingResponseInterface
    {
        $search ??= new SearchContactList();
        $responseHttp = $this->get(self::URL_CONTACT_LISTS, $search->getAsQuery());
        return $this->buildResponse($responseHttp, BaseResponse::class);
    }

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Contactlists-Get_single_Contactlist
     */
    public function getSingle(int $idContactList, ?SearchContactList $search = null): SmartEmailingResponseInterface
    {
        $search ??= new SearchContactList();
        $responseHttp = $this->get(
            $this->replaceUrlParameters(
                self::URL_CONTACT_LISTS . '/:id',
                [
                    'id' => $idContactList,
                ]
            ),
            $search->getAsQuery()
        );
        return $this->buildResponse($responseHttp, BaseResponse::class);
    }

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Contactlists-Truncate_Contactlist
     */
    public function truncate(int $idContactList): SmartEmailingResponseInterface
    {
        $responseHttp = $this->post(
            $this->replaceUrlParameters(
                self::URL_CONTACT_LISTS . '/:id/truncate',
                [
                    'id' => $idContactList,
                ]
            )
        );
        return $this->buildResponse($responseHttp, BaseResponse::class);
    }

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Contactlists-Update_Contactlist
     */
    public function update(int $idContactList, ContactList $contactList): SmartEmailingResponseInterface
    {
        $responseHttp = $this->put(
            $this->replaceUrlParameters(
                self::URL_CONTACT_LISTS . '/:id',
                [
                    'id' => $idContactList,
                ]
            ),
            $contactList->toArray()
        );
        return $this->buildResponse($responseHttp, BaseResponse::class);

    }

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Contacts_in_lists-Get_all_Contacts_in_list
     */
    public function getAllContacts(int $idContactList): SmartEmailingResponseInterface
    {
        $responseHttp = $this->get(
            $this->replaceUrlParameters(
                self::URL_CONTACT_LISTS . '/:id/contacts',
                [
                    'id' => $idContactList,
                ]
            )
        );
        return $this->buildResponse($responseHttp, BaseResponse::class);
    }

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Contacts_in_lists-Get_confirmed_Contacts_in_list
     */
    public function getAllConfirmedContacts(int $idContactList): SmartEmailingResponseInterface
    {
        $responseHttp = $this->get(
            $this->replaceUrlParameters(
                self::URL_CONTACT_LISTS . '/:id/contacts/confirmed',
                [
                    'id' => $idContactList,
                ]
            )
        );
        return $this->buildResponse($responseHttp, BaseResponse::class);
    }

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Contacts_in_lists-Get_unsubscribed_Contacts_in_list__including_blacklisted
     */
    public function getAllUnsubscribedContacts(int $idContactList): SmartEmailingResponseInterface
    {
        $responseHttp = $this->get(
            $this->replaceUrlParameters(
                self::URL_CONTACT_LISTS . '/:id/contacts/unsubscribed',
                [
                    'id' => $idContactList,
                ]
            )
        );
        return $this->buildResponse($responseHttp, BaseResponse::class);
    }
}