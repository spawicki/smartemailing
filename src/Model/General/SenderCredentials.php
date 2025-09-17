<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing\Api\Model\General;

use Spawicki\SmartEmailing\Api\Bag\Util\Helper;
use Spawicki\SmartEmailing\Api\Model\AbstractModel;

class SenderCredentials extends AbstractModel
{
    /**
     * From e-mail address of opt-in campaign
     */
    protected string $from;

    /**
     * Contact: From name of opt-in campaign
     * Email: Sender's name as displayed in From header
     */
    protected string $senderName;

    /**
     * Contact: Reply-To e-mail address in opt-in campaign
     * Email: E-mail address displayed in Reply-To header
     */
    protected string $replyTo;

    public function __construct(string $from, string $senderName, string $replyTo)
    {
        $this->setFrom($from);
        $this->setSenderName($senderName);
        $this->setReplyTo($replyTo);
    }

    public function getFrom(): string
    {
        return $this->from;
    }

    public function setFrom(string $from): static
    {
        Helper::validateEmail($from);
        $this->from = $from;
        return $this;
    }

    public function getSenderName(): string
    {
        return $this->senderName;
    }

    public function setSenderName(string $senderName): static
    {
        $this->senderName = $senderName;
        return $this;
    }

    public function getReplyTo(): string
    {
        return $this->replyTo;
    }

    public function setReplyTo(string $replyTo): static
    {
        Helper::validateEmail($replyTo);
        $this->replyTo = $replyTo;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'from' => $this->getFrom(),
            'sender_name' => $this->getSenderName(),
            'reply_to' => $this->getReplyTo(),
        ];
    }
}