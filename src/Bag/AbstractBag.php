<?php

declare(strict_types=1);

namespace App\Services\SmartEmailing\Api\src\Bag;

use App\Services\SmartEmailing\Api\src\Model\ModelInterface;
use JsonSerializable;
use Stringable;

abstract class AbstractBag implements JsonSerializable, Stringable
{
    protected array $items = [];
    protected array $idMap = [];

    public function get(int|string $index, mixed $default = null): mixed
    {
        return $this->items[$index] ?? $default;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function setItems(array $items): self
    {
        foreach ($items as $item) {
            if ($item instanceof ModelInterface) {
                $this->insertEntry($item);
            }
        }

        return $this;
    }

    public function isEmpty(): bool
    {
        return empty($this->items);
    }

    public function count(): int
    {
        return \count($this->items);
    }

    public function toArray(): array
    {
        return $this->items;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    protected function insertEntry(ModelInterface $entry): bool
    {
        if ($this->checkEntry($entry->getIdentifier())) {
            return false;
        }

        $this->items[] = $entry;
        $this->idMap[$entry->getIdentifier()] = $entry;

        return true;
    }

    protected function checkEntry(string $property): bool
    {
        return isset($this->idMap[$property]);
    }

    public function __toString(): string
    {
        return (string)\json_encode($this);
    }
}