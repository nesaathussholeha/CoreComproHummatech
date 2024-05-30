<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\CategoryNewsInterface;
use App\Models\CategoryNews;
use Illuminate\Http\Request;

class CategoryNewsRepository extends BaseRepository implements CategoryNewsInterface
{
    public function __construct(CategoryNews $categoryNews)
    {
        $this->model = $categoryNews;
    }
    public function where($column, $operator = null, $value = null, $boolean = 'and')
    {
        return $this->model->query()->where($column, $operator, $value, $boolean);
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
            ->when($request->name, function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->name . '%');
            })
            ->get();
    }
}
