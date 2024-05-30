<?php

namespace App\Contracts\Interfaces\Eloquent;

interface ServiceProductShowInterface
{
    /**
     * show
     *
     * @param  mixed $id
     * @return mixed
     */
    public function ServiceProductShow(mixed $relation,mixed $id): mixed;
}
