<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing\Endpoint;

use Spawicki\SmartEmailing\Response\BaseResponse;
use Spawicki\SmartEmailing\Response\LoginResponse;
use Spawicki\SmartEmailing\Response\SmartEmailingResponseInterface;

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