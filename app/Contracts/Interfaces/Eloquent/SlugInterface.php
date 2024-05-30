<?php

namespace App\Contracts\Interfaces\Eloquent;

interface SlugInterface
{
    /**
     * show
     *
     * @param  mixed $id
     * @return mixed
     */
    public function slug(mixed $slug): mixed;
}
