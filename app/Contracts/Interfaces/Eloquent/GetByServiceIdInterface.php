<?php

namespace App\Contracts\Interfaces\Eloquent;

interface GetByServiceIdInterface
{
    /**
     * Handle the Get all data event from models.
     *
     * @return mixed
     */

    public function getByServiceId(mixed $type): mixed;
}
