<?php

declare(strict_types=1);

namespace App\Services\SmartEmailing\Api\src\Model\Contact\Settings;

use App\Services\SmartEmailing\Api\src\Exception\AllowedTypeException;
use App\Services\SmartEmailing\Api\src\Model\AbstractModel;
use App\Services\SmartEmailing\Api\src\Model\Contact\Campaign;
use App\Services\SmartEmailing\Api\src\Model\Contact\SilencePeriod;

class DoubleOptInSettings extends AbstractModel
{
    public const string SEND_MODE_ALL = 'all';
    public const string SEND_MODE_NEW_IN_DATABASE = 'new-in-database';

    /**
     * Double-opt-in e-mail settings
     */
    protected Campaign $campaign;

    /**
     * By adding silence period you will not send double opt-in e-mail to any emailaddress that
     * recieved any opt-in e-mail in specified period.
     *
     * Note: to prevent double opt-in spam, silence_period is now added to double_opt_in_settings by default
     * (it not already provided) and set to 1 day.
     */
    protected ?SilencePeriod $silencePeriod;

    /**
     * Double-opt in send-to mode.
     * Fill-in all to send double opt-in e-email to every contact in batch, new-in-database
     * to send double opt-in e-email only to contacts that do not exist in the database yet.
     *
     * Allowed values: "all", "new-in-database"
     */
    protected string $sendToMode;

    /**
     * @throws AllowedTypeException
     */
    public function __construct(Campaign $campaign, string $sendToMode, ?SilencePeriod $silencePeriod = null)
    {
        $this->setCampaign($campaign);
        $this->setSilencePeriod($silencePeriod);
        $this->setSendToMode($sendToMode);
    }

    public function getCampaign(): Campaign
    {
        return $this->campaign;
    }

    public function setCampaign(Campaign $campaign): static
    {
        $this->campaign = $campaign;
        return $this;
    }

    public function getSilencePeriod(): ?SilencePeriod
    {
        return $this->silencePeriod;
    }

    public function setSilencePeriod(?SilencePeriod $silencePeriod): static
    {
        $this->silencePeriod = $silencePeriod;
        return $this;
    }

    public function getSendToMode(): string
    {
        return $this->sendToMode;
    }

    /**
     * @throws AllowedTypeException
     */
    public function setSendToMode(string $sendToMode): static
    {
        AllowedTypeException::check($sendToMode, [self::SEND_MODE_ALL, self::SEND_MODE_NEW_IN_DATABASE]);
        $this->sendToMode = $sendToMode;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'campaign' => $this->getCampaign(),
            'silence_period' => $this->getSilencePeriod(),
            'send_to_mode' => $this->getSendToMode(),
        ];
    }
}