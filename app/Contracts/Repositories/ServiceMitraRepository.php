<?php

namespace App\Contracts\Repositories;
use App\Models\ServiceMitra;
use App\Contracts\Interfaces\ServiceMitraInterface;

class ServiceMitraRepository extends BaseRepository implements ServiceMitraInterface
{
    public function __construct(ServiceMitra $serviceMitra)
    {
        $this->model = $serviceMitra;
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
        return $this->model->query()->where('mitra_id', $id)->delete();
    }

    public function getByServiceId(mixed $type): mixed
    {
        return $this->model->query()->where('service_id', $type)->get();
    }

    public function whereIn(string $relation, $id) :mixed
    {
        return $this->model->query()->whereIn($relation, $id);
    }

    public function where($slug) :mixed
    {
        return $this->model->query()->where('service_id', $slug);
    }
}
