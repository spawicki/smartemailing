<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing\Model\General;

use Spawicki\SmartEmailing\Bag\Util\Helper;
use Spawicki\SmartEmailing\Model\AbstractModel;
use Spawicki\SmartEmailing\Model\ModelInterface;

class Event extends AbstractModel implements ModelInterface
{
    /**
     * Email address to trigger the event for, will be created if necessary.
     */
    protected string $emailAddress;

    /**
     * Name of the event. All event nodes that listen for this event name will get triggered.
     */
    protected string $name;

    /**
     * Event payload. This payload is available throughout the entire contact's walkthrough.
     */
    protected array $payload = [];

    /**
     * @param string $emailAddress
     * @param string $name
     * @param array $payload
     */
    public function __construct(string $emailAddress, string $name, array $payload)
    {
        $this->setEmailAddress($emailAddress);
        $this->setName($name);
        $this->setPayload($payload);
    }

    public function getIdentifier(): string
    {
        return $this->getName();
    }

    public function getEmailAddress(): string
    {
        return $this->emailAddress;
    }

    public function setEmailAddress(string $emailAddress): static
    {
        Helper::validateEmail($emailAddress);
        $this->emailAddress = $emailAddress;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;
        return $this;
    }

    public function getPayload(): array
    {
        return $this->payload;
    }

    public function setPayload(array $payload): static
    {
        $this->payload = $payload;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'emailaddress' => $this->getEmailAddress(),
            'name' => $this->getName(),
            'payload' => $this->getPayload(),
        ];
    }
}