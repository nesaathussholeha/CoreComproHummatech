<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\ProfileInterface;
use App\Models\Profile;

class ProfileRepository extends BaseRepository implements ProfileInterface
{
    public function __construct(Profile $product )
    {
        $this->model = $product ;
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

    public function First(): mixed
    {
        return $this->model->query()->first();
    }
}

