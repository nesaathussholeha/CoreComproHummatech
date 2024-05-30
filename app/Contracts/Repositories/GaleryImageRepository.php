<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\GaleryImageInterface;
use App\Contracts\Repositories\BaseRepository;
use App\Models\GaleryImage;

class GaleryImageRepository extends BaseRepository implements GaleryImageInterface
{
    public function __construct(GaleryImage $galeryImage)
    {
        $this->model  = $galeryImage;
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
        return $this->model->query()->findOrFail($id)->delete();
    }

    public function ServiceProductShow(mixed $relation, mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id);
    }

    public function GetCount(): mixed
    {
        return $this->model->query()->where('gallery_id', '<>', null)->count();
    }

    public function show(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id);
    }
    public function whereIn(string $relation, $id)
    {
        return $this->model->query()->whereIn($relation, $id);
    }
}
