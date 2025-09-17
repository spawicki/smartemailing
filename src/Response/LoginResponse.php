<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing\Api\Response;

class LoginResponse extends BaseResponse
{
    protected ?int $accountId = null;


    public function getAccountId(): ?int
    {
        return $this->accountId;
    }

    public function setAccountId(?int $accountId): static
    {
        $this->accountId = $accountId;
        return $this;
    }

}