<?php

namespace App\Contracts\Interfaces\Eloquent;

interface WhereInRelationInterface
{
    /**
     * Get the specified relationship query.
     *
     * @param  string  $relation
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function whereIn(string $relation, $id);
}
