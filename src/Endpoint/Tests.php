<?php

declare(strict_types=1);

namespace App\Services\SmartEmailing\Api\src\Endpoint;

use App\Services\SmartEmailing\Api\src\Response\BaseResponse;
use App\Services\SmartEmailing\Api\src\Response\LoginResponse;
use App\Services\SmartEmailing\Api\src\Response\SmartEmailingResponseInterface;

class Tests extends AbstractEndpoint
{
    const string URL_PING = 'ping';
    const string URL_CHECK_CREDENTIALS = 'check-credentials';

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Tests-Aliveness_test
     */
    public function aliveness(): SmartEmailingResponseInterface
    {
        $responseHttp = $this->get(self::URL_PING);
        return $this->buildResponse($responseHttp, BaseResponse::class);
    }

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Tests-Login_test_with_GET
     */
    public function getLogin(): SmartEmailingResponseInterface
    {
        $responseHttp = $this->get(self::URL_CHECK_CREDENTIALS);
        return $this->buildResponse($responseHttp, LoginResponse::class);
    }

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Tests-Login_test_with_POST
     */
    public function postLogin(): SmartEmailingResponseInterface
    {
        $responseHttp = $this->post(self::URL_CHECK_CREDENTIALS);
        return $this->buildResponse($responseHttp, LoginResponse::class);
    }

}