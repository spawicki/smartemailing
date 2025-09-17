<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing\Bag;

use Spawicki\SmartEmailing\Model\General\Replace;

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