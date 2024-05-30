<?php

namespace App\Contracts\Interfaces\Eloquent;

interface GetCountInterface
{
    /**
     * Handle the Get all data event from models.
     *
     * @return mixed
     */

    public function GetCount(): mixed;
}
