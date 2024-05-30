<?php
namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\CountByRelationInterface;
use App\Contracts\Interfaces\Eloquent\CustomPaginationInterface;
use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetByServiceIdInterface;
use App\Contracts\Interfaces\Eloquent\GetCountInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\ServiceProductShowInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;

interface GalleryInterface extends GetInterface, StoreInterface, DeleteInterface, UpdateInterface, ServiceProductShowInterface, CountByRelationInterface , GetCountInterface
{}
