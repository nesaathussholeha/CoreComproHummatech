<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\StructureInterface;
use App\Models\Structure;

class StructureRepository extends BaseRepository implements StructureInterface
{
    public function __construct(Structure $structure)
    {
        $this->model = $structure;
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
        return $this->model->query()->findOrFail($id)->delete($id);
    }

    public function update(mixed $id, array $data): mixed
    {
        return $this->model->query()->findOrFail($id)->update($data);
    }

    public function getByType(mixed $type): mixed
    {
        return $this->model->query()->where('type', $type)->first();
    }
}
