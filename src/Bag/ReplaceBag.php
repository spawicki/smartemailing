<?php

declare(strict_types=1);

namespace App\Services\SmartEmailing\Api\src\Bag;

use App\Services\SmartEmailing\Api\src\Model\General\Replace;

class ReplaceBag extends AbstractBag
{
    public function add(Replace $model): ReplaceBag
    {
        $this->insertEntry($model);
        return $this;
    }

    public function create(
        string $key,
        string $content,
    ): Replace
    {
        $model = new Replace($key, $content);
        $this->add($model);
        return $model;
    }
}