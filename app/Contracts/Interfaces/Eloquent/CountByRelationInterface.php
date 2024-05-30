<?php

namespace App\Contracts\Interfaces\Eloquent;

interface CountByRelationInterface
{
    /**
     * Handle the Get all data event from models.
     *
     * @return mixed
     */

    public function CountByRelation(mixed $relation, $id): mixed;
}
