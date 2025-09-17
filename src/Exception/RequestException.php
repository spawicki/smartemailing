<?php

declare(strict_types=1);

namespace App\Services\SmartEmailing\Api\src\Exception;

use Psr\Http\Message\RequestInterface;

class RequestException extends \RuntimeException
{
    private ?RequestInterface $request;


    public function __construct(
        ?RequestInterface $request = null,
        string            $message = '',
        int               $code = 0,
        ?\Throwable       $exception = null,
    )
    {
        $this->request = $request;

        parent::__construct($message, $code, $exception);
    }

    public function getRequest(): ?RequestInterface
    {
        return $this->request;
    }

}