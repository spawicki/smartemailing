<?php

declare(strict_types=1);

namespace App\Services\SmartEmailing\Api\src\Response;

abstract class AbstractResponse implements SmartEmailingResponseInterface
{
    protected int $code;

    /**
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * @param int $code
     */
    public function setCode(int $code): void
    {
        $this->code = $code;
    }

}