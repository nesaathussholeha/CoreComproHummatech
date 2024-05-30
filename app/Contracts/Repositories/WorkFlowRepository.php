<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\WorkFlowInterface;
use App\Models\Workflow;
use Illuminate\Http\Request;

class WorkFlowRepository extends BaseRepository implements WorkFlowInterface
{
    public function __construct(Workflow $workflow)
    {
        $this->model = $workflow;
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
    public function search(Request $request): mixed
    {
        return $this->model->query()
        ->when($request->name, function ($query) use ($request){
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        })->get();
    }
}
