<?php

declare(strict_types=1);

namespace App\Services\SmartEmailing\Api\src\Model\General;

use App\Services\SmartEmailing\Api\src\Bag\Util\Helper;
use App\Services\SmartEmailing\Api\src\Model\AbstractModel;
use App\Services\SmartEmailing\Api\src\Model\ModelInterface;

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