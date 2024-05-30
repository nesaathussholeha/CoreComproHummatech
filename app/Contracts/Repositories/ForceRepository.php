<?php

namespace App\Contracts\Repositories;

use App\Models\Force;
use App\Contracts\Interfaces\ForceInterface;


class ForceRepository extends BaseRepository implements ForceInterface
{
    public function __construct(Force $force)
    {
        $this->model = $force;
    }
    public function get(): mixed
    {
        return $this->model->query()->get();
    }

    public function store(array $data): mixed
    {
        return $this->model->query()->create($data);
    }

    public function delete(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id)->delete();
    }

    public function update(mixed $id, array $data): mixed
    {
        return $this->model->query()->findOrFail($id)->update($data);
    }
    public function show(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id);
    }
}
