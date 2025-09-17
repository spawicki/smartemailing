<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing\Model\Contact;

use Spawicki\SmartEmailing\Bag\Util\Helper;
use Spawicki\SmartEmailing\Model\AbstractModel;

class ContactChangeEmailAddress extends AbstractModel
{
    /**
     * Original e-mail address of existing contact
     */
    protected string $originalEmailAddress;

    /**
     * New e-mail address
     */
    protected string $newEmailAddress;

    public function __construct(string $originalEmailAddress, string $newEmailAddress)
    {
        $this->setOriginalEmailAddress($originalEmailAddress);
        $this->setNewEmailAddress($newEmailAddress);
    }

    public function getOriginalEmailAddress(): string
    {
        return $this->originalEmailAddress;
    }

    public function setOriginalEmailAddress(string $originalEmailAddress): static
    {
        Helper::validateEmail($originalEmailAddress);
        $this->originalEmailAddress = $originalEmailAddress;
        return $this;
    }

    public function getNewEmailAddress(): string
    {
        return $this->newEmailAddress;
    }

    public function setNewEmailAddress(string $newEmailAddress): static
    {
        Helper::validateEmail($newEmailAddress);
        $this->newEmailAddress = $newEmailAddress;
        return $this;
    }


    public function toArray(): array
    {
        return [
            'from' => $this->getOriginalEmailAddress(),
            'to' => $this->getNewEmailAddress(),
        ];
    }

}