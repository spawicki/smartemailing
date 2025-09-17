<?php

declare(strict_types=1);

namespace App\Services\SmartEmailing\Api\src\Model\General;

use App\Services\SmartEmailing\Api\Bag\FeedItemBag;
use App\Services\SmartEmailing\Api\Model\General\Helpers;
use App\Services\SmartEmailing\Api\Model\General\OrderItemBag;
use App\Services\SmartEmailing\Api\src\Bag\AbstractBag;
use App\Services\SmartEmailing\Api\src\Bag\AttributeBag;
use App\Services\SmartEmailing\Api\src\Bag\Util\Helper;
use App\Services\SmartEmailing\Api\src\Exception\AllowedTypeException;
use App\Services\SmartEmailing\Api\src\Model\AbstractModel;
use App\Services\SmartEmailing\Api\src\Model\ModelInterface;

class Order extends AbstractModel implements ModelInterface
{
    public const string STATUS_PLACED = 'placed';
    public const string STATUS_PROCESSING = 'processing';
    public const string STATUS_SHIPPED = 'shipped';
    public const string STATUS_CANCELED = 'canceled';
    public const string STATUS_UNKNOWN = 'unknown';

    /**
     * E-mail address of imported order.
     * This is the only required field.
     */
    protected string $emailAddress;

    protected string $eshopName;

    protected string $eshopCode;

    /**
     * Format YYYY-MM-DD HH:MM:SS
     */
    protected ?string $createdAt = null;

    /**
     * Format YYYY-MM-DD HH:MM:SS
     */
    protected ?string $paidAt = null;

    /**
     * Status of order (defaults to placed when not specified).
     * Available values are placed, processing, shipped, cancelled, unknown.
     */
    protected ?string $status = null;

    protected AttributeBag $attributeBag;

    protected OrderItemBag $orderItemBag;

    protected FeedItemBag $feedItemBag;

    public function __construct(
        string $emailAddress,
        string $eshopName,
        string $eshopCode,
    ) {
        $this->setEmailAddress($emailAddress);
        $this->setEshopName($eshopName);
        $this->setEshopCode($eshopCode);
        $this->setAttributeBag(new AttributeBag());
        $this->setOrderItemBag(new OrderItemBag());
        $this->setFeedItemBag(new FeedItemBag());
    }

    public function getIdentifier(): string
    {
        return $this->getEshopCode();
    }

    public function setEmailAddress(string $emailAddress): Order
    {
        Helper::validateEmail($emailAddress);
        $this->emailAddress = $emailAddress;
        return $this;
    }

    public function setEshopName(string $eshopName): Order
    {
        $this->eshopName = $eshopName;
        return $this;
    }

    public function setEshopCode(string $eshopCode): Order
    {
        $this->eshopCode = $eshopCode;
        return $this;
    }

    public function setAttributeBag(AttributeBag $attributeBag): Order
    {
        $this->attributeBag = $attributeBag;
        return $this;
    }

    public function setOrderItemBag(OrderItemBag $orderItemBag): Order
    {
        $this->orderItemBag = $orderItemBag;
        return $this;
    }

    public function setFeedItemBag(FeedItemBag $feedItemBag): Order
    {
        $this->feedItemBag = $feedItemBag;
        return $this;
    }

    /**
     * @throws \DateMalformedStringException
     */
    public function setCreatedAt(string $createdAt): Order
    {
        $this->createdAt = Helper::formatDate($createdAt);
        return $this;
    }

    public function setPaidAt(string $paidAt): Order
    {
        $this->paidAt = Helpers::formatDate($paidAt);
        return $this;
    }

    /**
     * @throws AllowedTypeException
     */
    public function setStatus(string $status): Order
    {
        AllowedTypeException::check(
            $status,
            [
                self::STATUS_PLACED,
                self::STATUS_CANCELED,
                self::STATUS_PROCESSING,
                self::STATUS_SHIPPED,
                self::STATUS_UNKNOWN,
            ]
        );
        $this->status = $status;
        return $this;
    }

    public function getEmailAddress(): string
    {
        return $this->emailAddress;
    }

    public function getEshopName(): string
    {
        return $this->eshopName;
    }

    public function getEshopCode(): string
    {
        return $this->eshopCode;
    }

    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    public function getPaidAt(): ?string
    {
        return $this->paidAt;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function getAttributeBag(): AttributeBag
    {
        return $this->attributeBag;
    }

    public function getOrderItemBag(): OrderItemBag
    {
        return $this->orderItemBag;
    }

    public function getFeedItemBag(): FeedItemBag
    {
        return $this->feedItemBag;
    }
    public function toArray(): array
    {
        return \array_filter(
            [
                'emailaddress' => $this->getEmailAddress(),
                'eshop_name' => $this->getEshopName(),
                'eshop_code' => $this->getEshopCode(),
                'status' => $this->getStatus(),
                'paid_at' => $this->getPaidAt(),
                'created_at' => $this->getCreatedAt(),
                'attributes' => $this->getAttributeBag(),
                'items' => $this->getOrderItemBag(),
                'item_feeds' => $this->getFeedItemBag(),
            ],
            static fn ($item) => (
                (!\is_object($item) && !empty($item))
                || (\is_object($item) && \is_a($item, AbstractBag::class) && !$item->isEmpty())
            )
        );
    }
}