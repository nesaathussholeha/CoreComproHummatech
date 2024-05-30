<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\TeamInterface;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamRepository extends BaseRepository implements TeamInterface
{
    public function __construct(Team $team)
    {
        $this->model = $team;
    }

    public function customPaginate(Request $request, int $pagination = 10): mixed
    {
        return $this->model->query()->paginate($pagination);
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
            ->when($request->name, function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->name . '%');
            })
            ->get();
    }
}
