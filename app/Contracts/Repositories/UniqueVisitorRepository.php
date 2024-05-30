<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\UniqueVisitorInterface;
use App\Models\UniqueVisitor;

class UniqueVisitorRepository extends BaseRepository implements UniqueVisitorInterface
{
    public function __construct(UniqueVisitor $uniqueVisitor)
    {
        $this->model = $uniqueVisitor;
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
