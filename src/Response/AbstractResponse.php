<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing\Response;

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