<?php

declare(strict_types=1);

namespace App\Services\SmartEmailing\Api\src\Endpoint;

use App\Services\SmartEmailing\Api\src\Model\General\Purpose;
use App\Services\SmartEmailing\Api\src\Response\BaseResponse;
use App\Services\SmartEmailing\Api\src\Response\SmartEmailingResponseInterface;
use App\Services\SmartEmailing\Api\src\Search\General\SearchPurposeConnections;
use App\Services\SmartEmailing\Api\src\Search\General\SearchPurposes;

/**
 * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Processing_purposes
 * @package SmartEmailing\Api
 */
class ProcessingPurposes extends AbstractEndpoint
{
    const string URL_PURPOSES = 'purposes';
    const string URL_PURPOSE_CONNECTIONS = 'purpose-connections';

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Processing_purposes-Create_new_Processing_purpose
     */
    public function create(Purpose $purpose): SmartEmailingResponseInterface
    {
        $responseHttp = $this->post(self::URL_PURPOSES, $purpose->toArray());
        return $this->buildResponse($responseHttp, BaseResponse::class);
    }

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Processing_purposes-Get_Processing_purpose_connections
     */
    public function getListConnections(?SearchPurposeConnections $search = null): SmartEmailingResponseInterface
    {
        $search ??= new SearchPurposeConnections();
        $responseHttp = $this->get(self::URL_PURPOSE_CONNECTIONS, $search->getAsQuery());
        return $this->buildResponse($responseHttp, BaseResponse::class);
    }

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Processing_purposes-Get_Processing_purposes
     */
    public function getList(?SearchPurposes $search = null): SmartEmailingResponseInterface
    {
        $search ??= new SearchPurposes();
        $responseHttp = $this->get(self::URL_PURPOSES, $search->getAsQuery());
        return $this->buildResponse($responseHttp, BaseResponse::class);
    }

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Processing_purposes-Revoke_Processing_purpose_connection
     */
    public function revoke(int $idPurposeConnection): SmartEmailingResponseInterface
    {
        $responseHttp = $this->delete(
            $this->replaceUrlParameters(
                self::URL_PURPOSE_CONNECTIONS . '/:id',
                [
                    'id' => $idPurposeConnection,
                ]
            )
        );
        return $this->buildResponse($responseHttp, BaseResponse::class);
    }
}