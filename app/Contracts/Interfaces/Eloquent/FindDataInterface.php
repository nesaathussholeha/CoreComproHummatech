<?php

namespace App\Contracts\Interfaces\Eloquent;

interface FindDataInterface
{
    /**
     * @param int $id
     *
     * @return mixed
     */
    public function find(int $id): mixed;
}
