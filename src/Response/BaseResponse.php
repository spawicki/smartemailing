<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing\Api\Response;

class BaseResponse extends AbstractResponse
{
    protected string $status = '';
    protected string $message = '';
    protected array $meta = [];
    protected array $data = [];


    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;
        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return array
     */
    public function getMeta(): array
    {
        return $this->meta;
    }

    /**
     * @param array $meta
     * @return BaseResponse
     */
    public function setMeta(array $meta): static
    {
        $this->meta = $meta;
        return $this;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     * @return BaseResponse
     */
    public function setData(array $data): static
    {
        $this->data = $data;
        return $this;
    }

}