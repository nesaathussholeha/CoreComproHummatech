<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\WhereClauseInterface;

interface MisionItemsInterface extends StoreInterface, DeleteInterface, WhereClauseInterface, GetInterface
{

}
