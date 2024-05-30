<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\GalleryInterface;
use App\Models\Gallery;

class GalleryRepository extends BaseRepository implements GalleryInterface
{
    public function __construct(Gallery $procedure )
    {
        $this->model = $procedure ;
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

    public function ServiceProductShow(mixed $relation, mixed $id): mixed
    {
        return $this->model->query()->where($relation, $id);
    }
    public function CountByRelation(mixed $relation, $id): mixed
    {
        return $this->model->query()->where($relation, $id)->count();
    }

    public function GetCount(): mixed
    {
        return $this->model->query()->has('service')->get();
    }

}
