<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing\Api;

use Spawicki\SmartEmailing\Api\Enum\HttpMethod;
use Exception;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpClient\HttpOptions;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

abstract class AbstractApi
{
    private const string DOCUMENT_TYPE = 'application/json';

    /**
     * @throws Exception
     */
    public function __construct(
        private readonly string              $apiUrl,
        private readonly string              $username,
        private readonly string              $password,
        private readonly LoggerInterface     $logger,
        private HttpClientInterface          $client,
        private readonly SerializerInterface $serializer
    )
    {
        $this->initialize();
    }

    /**
     * @throws Exception
     */
    public function initialize(): void
    {
        try {
            if (empty($this->apiUrl)) {
                throw new Exception('SmartEmailing API Url not configured');
            }
            if (empty($this->username)) {
                throw new Exception('SmartEmailing API Username not set, check .env');
            }
            if (empty($this->password)) {
                throw new Exception('SmartEmailing API Password not configured');
            }
            $this->client = $this->client->withOptions(
                new HttpOptions()
                    ->setBaseUri($this->apiUrl)
                    ->setAuthBasic($this->username, $this->password)
                    ->setHeaders(['Accept' => self::DOCUMENT_TYPE])
                    ->toArray()
            );
        } catch (Exception $e) {
            $this->logger->error($e->getMessage());
            throw new Exception($e->getMessage());
        }
    }

    /**
     * @throws TransportExceptionInterface
     */
    public function request(HttpMethod $method, string $uri, array $options = []): ResponseInterface
    {
        return $this->client->request(
            $method->value,
            $uri,
            $options
        );
    }

    public function getSerializer(): SerializerInterface
    {
        return $this->serializer;
    }

    public function getLogger(): LoggerInterface
    {
        return $this->logger;
    }
}