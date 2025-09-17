<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing\Api\Model\General;

use Spawicki\SmartEmailing\Api\Bag\Util\Helper;
use Spawicki\SmartEmailing\Api\Model\AbstractModel;
use Spawicki\SmartEmailing\Api\Model\ModelInterface;

class Recipient extends AbstractModel implements ModelInterface
{
    /**
     * Recipient's e-mail address
     * We need e-mail address asi unique contact identifier. No Contact can exist without it.
     */
    protected string $emailAddress;

    public function __construct(string $emailAddress)
    {
        $this->setEmailAddress($emailAddress);
    }

    public function getIdentifier(): string
    {
        return $this->getEmailAddress();
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

    public function toArray(): array
    {
        return [
            'emailaddress' => $this->getEmailAddress(),
        ];
    }
}