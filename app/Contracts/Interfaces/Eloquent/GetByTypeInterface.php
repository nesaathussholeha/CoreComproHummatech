<?php

namespace App\Contracts\Interfaces\Eloquent;

interface GetByTypeInterface
{
    /**
     * Handle the Get all data event from models.
     *
     * @return mixed
     */

    public function getByType(mixed $type): mixed;
}
