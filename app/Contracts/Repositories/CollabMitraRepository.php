<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\CollabMitraInterface;
use App\Models\CollabMitra;
use Illuminate\Http\Request;

class CollabMitraRepository extends BaseRepository implements CollabMitraInterface
{
    public function __construct(CollabMitra $collabMitra)
    {
        $this->model = $collabMitra;
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
    public function search(Request $request): mixed
    {
        return $this->model->query()
            ->when($request->has('name'), function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->name . '%');
            })
            ->when($request->has('collab_category_id'), function ($query) use ($request) {
                $query->where('collab_category_id', $request->collab_category_id);
            })
            ->get();
    }

}
