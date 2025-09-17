<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing\Api\Response;

class UnauthorizedResponse extends BaseResponse
{

    public function __construct()
    {
        $this->setMessage("Authentication Failed");
    }

}