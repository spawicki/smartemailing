<?php

declare(strict_types=1);

namespace App\Services\SmartEmailing\Api\src\Endpoint;

use App\Services\SmartEmailing\Api\src\Response\BaseResponse;
use App\Services\SmartEmailing\Api\src\Response\SmartEmailingResponseInterface;

/**
 * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Web_Forms
 * @package SmartEmailing\Api
 */
class WebForms extends AbstractEndpoint
{
    const string URL_WEB_FORMS = 'web-forms';
    const string URL_WEB_FORM_STRUCTURE = 'web-form-structure';

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Web_Forms-Get_all_Web_Form_ids_and_names
     */
    public function getList(): SmartEmailingResponseInterface
    {
        $responseHttp = $this->get(self::URL_WEB_FORMS);
        return $this->buildResponse($responseHttp, BaseResponse::class);
    }

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Web_Forms-Get_single_Web_Form_structure
     */
    public function getSingle(int $idWebForm): SmartEmailingResponseInterface
    {

        $responseHttp = $this->get(
            $this->replaceUrlParameters(
                self::URL_WEB_FORM_STRUCTURE . '/:id',
                [
                    'id' => $idWebForm,
                ]
            )
        );
        return $this->buildResponse($responseHttp, BaseResponse::class);
    }
}