<?php

namespace App\Services;

use App\Contracts\Interfaces\UniqueVisitorInterface;
use Carbon\Carbon;
use App\Contracts\Interfaces\VisitorDetectionInterface;

class HomeService
{
    private VisitorDetectionInterface $visitorDetection;
    private UniqueVisitorInterface $visitor;
    public function __construct( VisitorDetectionInterface $visitorDetection, UniqueVisitorInterface $visitor)
    {
        $this->visitorDetection = $visitorDetection;
        $this->visitor = $visitor;
    }
    public function Chart(VisitorDetectionInterface $visitorDetection)
    {
        $Curentyear = Carbon::now()->year;
        $Curentmonth = Carbon::now()->month;

        $grafikDataCollection = [];

        for($month = 1; $month <= 12; $month++){
            $date = Carbon::createFromDate($Curentyear, $month, 1);
            $yearMonth = $date->isoFormat('MMMM');
            $visitor = $this->visitorDetection->Chart($Curentyear, $month);

            $grafikDataCollection[] = [
             'year' => $Curentyear,
             'month' => $yearMonth,
             'visitor' => $visitor
            ];
        }
        $data  = array_values($grafikDataCollection);


        return $data;
    }

    public function ChartVisitor(UniqueVisitorInterface $visitor)
    {
        $Curentyear = Carbon::now()->year;
        $Curentmonth = Carbon::now()->month;

        $grafikDataCollection = [];

        for($month = 1; $month <= 12; $month++){
            $date = Carbon::createFromDate($Curentyear, $month, 1);
            $yearMonth = $date->isoFormat('MMMM');
            $visitor = $this->visitor->Chart($Curentyear, $month);

            $grafikDataCollection[] = [
             'year' => $Curentyear,
             'month' => $yearMonth,
             'visitor' => $visitor
            ];
        }
        $data  = array_values($grafikDataCollection);


        return $data;
    }
}
