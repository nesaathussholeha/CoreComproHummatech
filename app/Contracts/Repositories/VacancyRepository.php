<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\VacancyInterface;
use App\Models\Vacancy;

class VacancyRepository extends BaseRepository implements VacancyInterface
{
    public function __construct(Vacancy $vacancy)
    {
        $this->model = $vacancy;
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
