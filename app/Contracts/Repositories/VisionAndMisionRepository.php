<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\VisionAndMisionInterface;
use App\Models\VisionAndMision;

class VisionAndMisionRepository extends BaseRepository implements VisionAndMisionInterface
{
    public function __construct(VisionAndMision $visionAndMision)
    {
        $this->model = $visionAndMision;
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
        return $this->model->findOrFail($id)->update($data);
    }
}
