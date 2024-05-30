<?php

namespace App\Contracts\Interfaces\Eloquent;

interface HasRelationInterface
{
    /**
     * Get the specified relationship query.
     *
     * @param  string  $relation
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function whereHas(string $relation, $query);
}
