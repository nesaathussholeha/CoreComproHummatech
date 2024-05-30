<?php

namespace App\Contracts\Repositories;

use App\Models\Product;
use App\Contracts\Interfaces\ProductFeatureInterface;
use App\Models\ProductFeature;

class ProductFeatureRepository extends BaseRepository implements ProductFeatureInterface
{
    public function __construct(ProductFeature $product)
    {
        $this->model = $product;
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
    public function show(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id);
    }
    public function getByType(mixed $type): mixed
    {
        return $this->model->query()->where('type', $type)->get();
    }
    public function getByServiceId(mixed $id): mixed
    {
        return $this->model->query()->where('product_id', $id)->get();
    }

    public function First(): mixed
    {
        return $this->model->query()->first()->get();
    }
}
