<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing\Api\Model\Contact;

use Spawicki\SmartEmailing\Api\Exception\AllowedTypeException;
use Spawicki\SmartEmailing\Api\Model\AbstractModel;
use Spawicki\SmartEmailing\Api\Model\ModelInterface;
use function intval;

class ContactList extends AbstractModel implements ModelInterface
{
    public const string CONFIRMED = 'confirmed';
    public const string REMOVED = 'removed';
    public const string UNSUBSCRIBED = 'unsubscribed';

    protected int $id;

    /**
     * Contact's status in Contactlist. Allowed values: "confirmed", "unsubscribed", "removed"
     */
    protected string $status = self::CONFIRMED;

    /**
     * @throws AllowedTypeException
     */
    public function __construct(int $id, string $status)
    {
        $this->setId($id);
        $this->setStatus($status);
    }

    public function getIdentifier(): string
    {
        return (string)$this->getId();
    }

    public function setId(int $id): ContactList
    {
        $this->id = intval($id);
        return $this;
    }

    /**
     * Contact's status in Contact-list. Allowed values: "confirmed", "unsubscribed", "removed"
     * @throws AllowedTypeException
     */
    public function setStatus(string $status): ContactList
    {
        AllowedTypeException::check(
            $status,
            [
                self::CONFIRMED,
                self::UNSUBSCRIBED,
                self::REMOVED,
            ]
        );
        $this->status = $status;
        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'status' => $this->getStatus(),
        ];
    }
}