<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\CollabMitraInterface;
use App\Contracts\Interfaces\TitleInterface;
use App\Models\CollabMitra;
use App\Models\Title;
use Illuminate\Http\Request;

class TitleRepository extends BaseRepository implements TitleInterface
{
    public function __construct(Title $title)
    {
        $this->model = $title;
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
    public function GetCount(): mixed
    {
        return $this->model->query()->count();
    }
}
