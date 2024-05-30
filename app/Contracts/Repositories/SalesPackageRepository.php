<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\SalesPackageInterface;
use App\Models\SalesPackage;

class SalesPackageRepository extends BaseRepository implements SalesPackageInterface
{
    public function __construct(SalesPackage $salesPackage)
    {
        $this->model = $salesPackage;
    }

    public function get(): mixed
    {
        return $this->model->query()->get();
    }

    public function store(array $data): mixed
    {
        return $this->model->query()->create($data);
    }

    public function update(mixed $id, array $data): mixed
    {
        return $this->model->query()->findOrFail($id)->update($data);
    }

    public function delete(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id)->delete($id);
    }
}
