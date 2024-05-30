<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\VisitorDetectionInterface;
use App\Models\VisitorDetection;
use PhpParser\Node\Expr\FuncCall;

class VisitorDetectionRepository extends BaseRepository implements VisitorDetectionInterface
{
    public function __construct(VisitorDetection $visitorDetection)
    {
        $this->model = $visitorDetection;
    }

    public function GetCount(): mixed
    {
        return $this->model->query()->count();
    }

    public function get(): mixed
    {
        return $this->model->query()->get();
    }

    public function Chart(mixed $year, mixed $month): mixed
    {
        return $this->model->whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->count();
    }

}
