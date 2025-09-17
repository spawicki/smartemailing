<?php

declare(strict_types=1);

namespace App\Services\SmartEmailing\Api\src\Response;

class UnauthorizedResponse extends BaseResponse
{

    public function __construct()
    {
        $this->setMessage("Authentication Failed");
    }

}