<?php

declare(strict_types=1);

namespace App\Services\SmartEmailing\Api\src\Model\General;

use App\Services\SmartEmailing\Api\src\Model\AbstractModel;
use App\Services\SmartEmailing\Api\src\Model\ModelInterface;

class Attribute extends AbstractModel implements ModelInterface
{
    protected string $name;

    protected string $value;

    public function __construct(string $name, string $value)
    {
        $this->setName($name);
        $this->setValue($value);
    }

    public function getIdentifier(): string
    {
        return $this->getName();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Attribute
    {
        $this->name = $name;
        return $this;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): Attribute
    {
        $this->value = $value;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->getName(),
            'value' => $this->getValue(),
        ];
    }
}