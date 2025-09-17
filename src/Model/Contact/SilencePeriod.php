<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing\Api\Model\Contact;

use Spawicki\SmartEmailing\Api\Model\General\Period;

class SilencePeriod extends Period
{
    /**
     * Allowed values: "seconds", "minutes", "hours", "days", "weeks", "months", "years"
     */
    protected function getAllowedUnits(): array
    {
        return [
            self::SECONDS,
            self::MINUTES,
            self::HOURS,
            self::DAYS,
            self::WEEKS,
            self::MONTHS,
            self::YEARS,
        ];
    }
}