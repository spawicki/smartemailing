<?php

declare(strict_types=1);

namespace App\Services\SmartEmailing\Api\src\Model\General;

trait PropertyTrait
{
    protected object $json;

    public function getJson(): object
    {
        return $this->json;
    }

    protected function setPropertyValue(string $key, ?string $propertyName = null): self
    {
        if (\is_null($propertyName)) {
            $propertyName = $key;
        }

        $this->{$propertyName} = $this->getPropertyValue($this->json, $key, $this->{$propertyName});
        return $this;
    }

    protected function getPropertyValue(object $object, string $key, mixed $default = null): mixed
    {
        if (\property_exists($object, $key)) {
            return $object->{$key};
        }

        return $default;
    }
}