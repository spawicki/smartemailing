<?php

declare(strict_types=1);

namespace App\Services\SmartEmailing\Api\src\Model\General;

use App\Services\SmartEmailing\Api\src\Exception\AllowedTypeException;
use App\Services\SmartEmailing\Api\src\Model\AbstractModel;

class Period extends AbstractModel
{
    public const string SECONDS = 'seconds';
    public const string MINUTES = 'minutes';
    public const string HOURS = 'hours';
    public const string DAYS = 'days';
    public const string WEEKS = 'weeks';
    public const string MONTHS = 'months';
    public const string YEARS = 'years';

    /**
     * Period unit
     * Allowed values: see getAllowedUnits()
     */
    protected string $unit;

    /**
     * Period value, must be integer
     */
    protected int $value;

    /**
     * @throws AllowedTypeException
     */
    public function __construct(string $unit, int $value)
    {
        $this->setUnit($unit);
        $this->setValue($value);
    }

    public function getUnit(): string
    {
        return $this->unit;
    }

    /**
     * @throws AllowedTypeException
     */
    public function setUnit(string $unit): Period
    {
        AllowedTypeException::check($unit, $this->getAllowedUnits());
        $this->unit = $unit;
        return $this;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function setValue(int $value): Period
    {
        $this->value = $value;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'unit' => $this->getUnit(),
            'value' => $this->getValue(),
        ];
    }

    protected function getAllowedUnits(): array
    {
        return [
            self::DAYS,
            self::MONTHS,
            self::YEARS,
        ];
    }
}