<?php

namespace Spawicki\SmartEmailing\Response;

interface SmartEmailingResponseInterface
{
    public function getCode(): int;

    public function getStatus(): string;

    public function getMessage(): string;

    public function getMeta(): array;

    public function getData(): array;

    public function setCode(int $code);

    public function setStatus(string $status);

    public function setMessage(string $message);

    public function setMeta(array $meta);

    public function setData(array $data);
}