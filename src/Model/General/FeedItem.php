<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing\Api\Model\General;

use Spawicki\SmartEmailing\Api\Model\AbstractModel;
use Spawicki\SmartEmailing\Api\Model\ModelInterface;

class FeedItem extends AbstractModel implements ModelInterface
{
    protected string $id;
    protected string $feedName;
    protected int $quantity = 0;

    public function __construct(string $id, string $feedName, int $quantity = 0)
    {
        $this->setId($id);
        $this->setFeedName($feedName);
        $this->setQuantity($quantity);
    }

    public function getIdentifier(): string
    {
        return $this->getId();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): FeedItem
    {
        $this->id = $id;
        return $this;
    }

    public function getFeedName(): string
    {
        return $this->feedName;
    }

    public function setFeedName(string $feedName): FeedItem
    {
        $this->feedName = $feedName;
        return $this;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): FeedItem
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'item_id' => $this->getId(),
            'feed_name' => $this->getFeedName(),
            'quantity' => $this->getQuantity(),
        ];
    }
}