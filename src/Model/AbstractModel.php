<?php

declare(strict_types=1);

namespace App\Services\SmartEmailing\Api\src\Model;

use JsonSerializable;
use Symfony\Component\PropertyAccess\PropertyAccess;

abstract class AbstractModel implements JsonSerializable
{

    public function toArray(): array
    {
        $reflection = new \ReflectionClass($this);
        $properties = $reflection->getProperties();
        $data = [];

        foreach ($properties as $property) {
            $data[$property->getName()] = $property->getValue($this);
        }

        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }


    public static function fromArray(array $data): static
    {
        $model = new static();
        $accessor = PropertyAccess::createPropertyAccessor();

        foreach ($data as $property => $value) {
            if ($accessor->isWritable($model, $property)) {
                $accessor->setValue($model, $property, $value);
            }
        }

        return $model;
    }
}