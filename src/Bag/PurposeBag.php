<?php

declare(strict_types=1);

namespace App\Services\SmartEmailing\Api\src\Bag;

use App\Services\SmartEmailing\Api\src\Model\Contact\Purpose;

class PurposeBag extends AbstractBag
{
    public function add(Purpose $model): PurposeBag
    {
        $this->insertEntry($model);
        return $this;
    }

    /**
     * @throws \DateMalformedStringException
     */
    public function create(
        int     $id,
        ?string $validFrom = null,
        ?string $validTo = null,
    ): Purpose
    {
        $model = new Purpose($id, $validFrom, $validTo);
        $this->add($model);
        return $model;
    }
}