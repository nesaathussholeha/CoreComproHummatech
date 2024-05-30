<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\BackgroundInterface;
use App\Models\Background;

class BackgroundRepository extends BaseRepository implements BackgroundInterface
{
    public function __construct(Background $background)
    {
        $this->model = $background;
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
        return $this->model->query()->where('show_in', $type)->first();
    }

    public function getByServiceId(mixed $type): mixed
    {
        return $this->model->query()->where('service_id', $type)->first();
    }
    
    public function getByAbout(string $about): mixed
    {
        return $this->model->query()->where('about_in', $about)->first();
    }
}
