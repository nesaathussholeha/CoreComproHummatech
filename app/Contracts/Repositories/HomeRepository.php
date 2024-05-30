<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\HomeInterface;
use App\Models\Home;

class HomeRepository extends BaseRepository implements HomeInterface
{
    public function __construct(Home $home)
    {
        $this->model = $home;
    }
    public function get(): mixed
    {
        return $this->model->query()->first();
    }
    public function store(array $data): mixed
    {
        return  $this->model->query()->create($data);
    }

    public function delete(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id)->delete($id);
    }

    public function update(mixed $id, array $data): mixed
    {
        return $this->model->query()->findOrFail($id)->update($data);
    }
}
