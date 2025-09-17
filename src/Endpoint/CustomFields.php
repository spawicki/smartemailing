<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing\Api\Endpoint;

use Spawicki\SmartEmailing\Api\Model\Contact\CustomField;
use Spawicki\SmartEmailing\Api\Response\BaseResponse;
use Spawicki\SmartEmailing\Api\Response\SmartEmailingResponseInterface;
use Spawicki\SmartEmailing\Api\Search\General\SearchContactCustomFields;
use Spawicki\SmartEmailing\Api\Search\General\SearchCustomFields;
use Spawicki\SmartEmailing\Api\Search\General\SearchSingleCustomFields;

/**
 * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Customfields
 * @package SmartEmailing\Api
 */
class CustomFields extends AbstractEndpoint
{
    const string URL_CUSTOM_FIELDS = 'customfields';
    const string URL_CONTACT_CUSTOM_FIELDS = 'contact-customfields';

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Customfields-Create_new_Customfield
     */
    public function create(CustomField $customField): SmartEmailingResponseInterface
    {
        $responseHttp = $this->post(self::URL_CUSTOM_FIELDS, $customField->toArray());
        return $this->buildResponse($responseHttp, BaseResponse::class);
    }

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Customfields-Delete_Customfield
     */
    public function remove(int $idCustomField): SmartEmailingResponseInterface
    {
        $responseHttp = $this->delete(
            $this->replaceUrlParameters(
                self::URL_CUSTOM_FIELDS . '/:id',
                [
                    'id' => $idCustomField,
                ]
            )
        );
        return $this->buildResponse($responseHttp, BaseResponse::class);
    }

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Customfields-Get_Customfield_values
     */
    public function getContactCustomFields(?SearchContactCustomFields $search = null): SmartEmailingResponseInterface
    {
        $search ??= new SearchContactCustomFields();
        $responseHttp = $this->get(self::URL_CONTACT_CUSTOM_FIELDS, $search->getAsQuery());
        return $this->buildResponse($responseHttp, BaseResponse::class);
    }

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Customfields-Get_Customfields
     */
    public function getList(?SearchCustomFields $search = null): SmartEmailingResponseInterface
    {
        $search ??= new SearchCustomFields();
        $responseHttp = $this->get(self::URL_CUSTOM_FIELDS, $search->getAsQuery());
        return $this->buildResponse($responseHttp, BaseResponse::class);
    }

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Customfields-Get_single_Customfield
     */
    public function getSingle(int $idCustomField, ?SearchSingleCustomFields $search = null): SmartEmailingResponseInterface
    {
        $search ??= new SearchSingleCustomFields();
        $responseHttp = $this->get(
            $this->replaceUrlParameters(
                self::URL_CUSTOM_FIELDS . '/:id',
                [
                    'id' => $idCustomField,
                ]
            ),
            $search->getAsQuery()
        );
        return $this->buildResponse($responseHttp, BaseResponse::class);
    }
}