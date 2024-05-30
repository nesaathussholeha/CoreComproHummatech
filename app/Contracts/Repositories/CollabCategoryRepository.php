<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\CollabCategoryInterface;
use App\Models\CategoryNews;
use App\Models\CollabCategory;
use Illuminate\Http\Request;

class CollabCategoryRepository extends BaseRepository implements CollabCategoryInterface
{
    public function __construct(CollabCategory $collabCategory)
    {
        $this->model = $collabCategory;
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
        ->when($request->name, function ($query) use ($request) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        })->get();
    }
}
