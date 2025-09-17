<?php

declare(strict_types=1);

namespace App\Services\SmartEmailing\Api\src\Endpoint;

use App\Services\SmartEmailing\Api\src\Bag\Util\Helper;
use App\Services\SmartEmailing\Api\src\Enum\DataFormat;
use App\Services\SmartEmailing\Api\src\Enum\HttpMethod;
use App\Services\SmartEmailing\Api\src\Enum\ResponseCode;
use App\Services\SmartEmailing\Api\src\Enum\ResponseStatus;
use App\Services\SmartEmailing\Api\src\Response\SmartEmailingResponseInterface;
use App\Services\SmartEmailing\Api\src\Response\UnauthorizedResponse;
use App\Services\SmartEmailing\Api\src\SmartEmailingApi;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

abstract class AbstractEndpoint implements EndpointInterface
{
    protected int $chunkLimit = 500;

    public function __construct(protected readonly SmartEmailingApi $api)
    {
    }

    /**
     * @throws TransportExceptionInterface
     */
    protected function get(string $uri, array $params = []): ResponseInterface
    {
        return $this->query(HttpMethod::GET, $uri, $params);
    }

    /**
     * @throws TransportExceptionInterface
     */
    protected function post(string $uri, array $params = []): ResponseInterface
    {
        return $this->json(HttpMethod::POST, $uri, $params);
    }

    /**
     * @throws TransportExceptionInterface
     */
    protected function put(string $uri, array $params = []): ResponseInterface
    {
        return $this->json(HttpMethod::PUT, $uri, $params);
    }

    /**
     * @throws TransportExceptionInterface
     */
    protected function patch(string $uri, array $params = []): ResponseInterface
    {
        return $this->json(HttpMethod::PATCH, $uri, $params);
    }

    /**
     * @throws TransportExceptionInterface
     */
    protected function delete(string $uri, array $params = []): ResponseInterface
    {
        return $this->query(HttpMethod::DELETE, $uri, $params);
    }

    /**
     * @throws TransportExceptionInterface
     */
    protected function query(HttpMethod $method, string $uri, array $params = []): ResponseInterface
    {
        return $this->api->request($method, $uri, ['query' => $params]);
    }

    /**
     * @throws TransportExceptionInterface
     */
    protected function json(HttpMethod $method, string $uri, array $params = []): ResponseInterface
    {
        return $this->api->request($method, $uri, [DataFormat::JSON->value => $params]);
    }

    protected function replaceUrlParameters(string $uri, array $parameters): string
    {
        return Helper::replaceUrlParameters($uri, $parameters);
    }

    protected static function encodePath(string $uri): string
    {
        return \rawurlencode($uri);
    }

    protected function buildResponse(ResponseInterface $response, string $modelClass, string $format = DataFormat::JSON->value): ?SmartEmailingResponseInterface
    {
        try {
            /**
             * @var SmartEmailingResponseInterface $apiResponse
             */
            $apiResponse = $this->api->getSerializer()->deserialize($response->getContent(false), $modelClass, $format);
            $apiResponse->setCode($response->getStatusCode());

            return $apiResponse;
        } catch (TransportExceptionInterface|ServerExceptionInterface|RedirectionExceptionInterface|ClientExceptionInterface $e) {
            $this->api->getLogger()->error('SmartEmailing build response exception: ' . $e->getMessage());
            $apiResponse = new UnauthorizedResponse();
            $apiResponse->setCode(ResponseCode::HTTP_UNAUTHORIZED_CODE->value);
            return $apiResponse->setStatus(ResponseStatus::ERROR->value);
        }
    }

}