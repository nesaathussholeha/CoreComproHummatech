<?php

namespace App\Contracts\Repositories;

use App\Models\Termscondition;
use App\Contracts\Interfaces\TermsconditionInterface;
use Illuminate\Http\Request;

class TermsconditionRepository extends BaseRepository implements TermsconditionInterface
{

    public function __construct(Termscondition $termscondition)
    {
        $this->model = $termscondition;
    }

    public function customPaginate(Request $request, int $pagination = 10): mixed
    {
        return $this->model->query()->paginate($pagination);
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
    public function search(Request $request): mixed
    {
        return $this->model->query()
        ->when($request->termcondition, function ($query) use ($request) {
            $query->where('termcondition', 'LIKE', '%' . $request->termcondition . '%');
        })
        ->get();
    }
}
