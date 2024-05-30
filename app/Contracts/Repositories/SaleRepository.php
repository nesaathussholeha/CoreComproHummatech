<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\SaleInterface;
use App\Models\Sale;

class SaleRepository extends BaseRepository implements SaleInterface
{
    public function __construct(Sale $sale)
    {
        $this->model = $sale;
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

    public function getByServiceId(mixed $id): mixed
    {
        return $this->model->query()->where('service_id', $id)->get();
    }
}
