<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetByServiceIdInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;
use App\Contracts\Interfaces\Eloquent\WhereClauseInterface;
use App\Contracts\Interfaces\Eloquent\WhereInRelationInterface;

interface ServiceMitraInterface extends GetInterface, StoreInterface, UpdateInterface, DeleteInterface, GetByServiceIdInterface, WhereInRelationInterface, WhereClauseInterface
{

}
