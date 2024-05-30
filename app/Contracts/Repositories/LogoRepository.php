<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\LogoInterface;
use App\Models\Logo;

class LogoRepository extends BaseRepository implements LogoInterface
{
    public function __construct(Logo $logo)
    {
        $this->model = $logo;
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
}
