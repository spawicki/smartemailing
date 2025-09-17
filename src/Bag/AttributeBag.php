<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing\Bag;

use Spawicki\SmartEmailing\Model\General\Attribute;

class AttributeBag extends AbstractBag
{
    public function add(Attribute $model): AttributeBag
    {
        $this->insertEntry($model);
        return $this;
    }

    public function create(string $name, string $value): Attribute
    {
        $model = (new Attribute($name, $value));
        $this->add($model);
        return $model;
    }
}