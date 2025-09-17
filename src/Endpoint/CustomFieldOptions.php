<?php

declare(strict_types=1);

namespace App\Services\SmartEmailing\Api\src\Endpoint;

use App\Services\SmartEmailing\Api\src\Exception\RequiredFieldException;
use App\Services\SmartEmailing\Api\src\Model\General\CustomFieldOption;
use App\Services\SmartEmailing\Api\src\Response\BaseResponse;
use App\Services\SmartEmailing\Api\src\Response\SmartEmailingResponseInterface;
use App\Services\SmartEmailing\Api\src\Search\General\SearchCustomFieldOptions;
use App\Services\SmartEmailing\Api\src\Search\General\SearchSingleCustomFieldOptions;

/**
 * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Customfield_Options
 * @package SmartEmailing\Api
 */
class CustomFieldOptions extends AbstractEndpoint
{
    const string URL_CUSTOM_FIELD_OPTIONS = 'customfield-options';

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Customfield_Options-Create_new_Customfield_option
     * @throws RequiredFieldException
     */
    public function create(CustomFieldOption $customField): SmartEmailingResponseInterface
    {
        $responseHttp = $this->post(self::URL_CUSTOM_FIELD_OPTIONS, $customField->toArray());
        return $this->buildResponse($responseHttp, BaseResponse::class);
    }

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Customfield_Options-Delete_Customfield_option
     */
    public function remove(int $idCustomFieldOption): SmartEmailingResponseInterface
    {
        $responseHttp = $this->delete(
            $this->replaceUrlParameters(
                self::URL_CUSTOM_FIELD_OPTIONS . '/:id',
                [
                    'id' => $idCustomFieldOption,
                ]
            )
        );
        return $this->buildResponse($responseHttp, BaseResponse::class);
    }

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Customfield_Options-Get_Customfield_options
     */
    public function getList(?SearchCustomFieldOptions $search = null): SmartEmailingResponseInterface
    {
        $search ??= new SearchCustomFieldOptions();
        $responseHttp = $this->get(self::URL_CUSTOM_FIELD_OPTIONS, $search->getAsQuery());
        return $this->buildResponse($responseHttp, BaseResponse::class);
    }

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Customfield_Options-Get_single_Customfield_option
     */
    public function getSingle(int $idCustomFieldOption, ?SearchSingleCustomFieldOptions $search = null): SmartEmailingResponseInterface
    {
        $search ??= new SearchSingleCustomFieldOptions();

        $responseHttp = $this->get(
            $this->replaceUrlParameters(
                self::URL_CUSTOM_FIELD_OPTIONS . '/:id',
                [
                    'id' => $idCustomFieldOption,
                ]
            ),
            $search->getAsQuery()
        );
        return $this->buildResponse($responseHttp, BaseResponse::class);
    }

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Customfield_Options-Update_Customfield_option
     * @throws RequiredFieldException
     */
    public function update(int $idCustomFieldOption, CustomFieldOption $customFieldOption): SmartEmailingResponseInterface
    {
        $responseHttp = $this->patch(
            $this->replaceUrlParameters(
                self::URL_CUSTOM_FIELD_OPTIONS . '/:id',
                [
                    'id' => $idCustomFieldOption,
                ]
            ),
            $customFieldOption->toArray()
        );
        return $this->buildResponse($responseHttp, BaseResponse::class);
    }
}