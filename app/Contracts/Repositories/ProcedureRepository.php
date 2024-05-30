<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\ProcedureInterface;
use App\Models\Procedure;
use Illuminate\Http\Request;

class ProcedureRepository extends BaseRepository implements ProcedureInterface
{
    public function __construct(Procedure $procedure )
    {
        $this->model = $procedure ;
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

    public function getByServiceId(mixed $id): mixed
    {
        return $this->model->query()->where('service_id', $id)->get();
    }
    public function search(Request $request): mixed
    {
        return $this->model->query()
            ->when($request->title, function ($query) use ($request) {
                $query->where('title', 'LIKE', '%' . $request->title . '%');
            })
            ->get();
    }

}
