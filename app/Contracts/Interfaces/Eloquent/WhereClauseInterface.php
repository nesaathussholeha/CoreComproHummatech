<?php

namespace App\Contracts\Interfaces\Eloquent;

interface WhereClauseInterface
{
    /**
     * Add a where clause to the query.
     *
     * @param  string  $column
     * @param  string  $operator
     * @param  mixed  $value
     * @param  string  $boolean
     * @return $this
     */
    public function where(mixed $slug);
}
