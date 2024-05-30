<?php
namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\ChartInterface;
use App\Contracts\Interfaces\Eloquent\GetCountInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;

interface UniqueVisitorInterface extends GetCountInterface, GetInterface, ChartInterface
{

}
