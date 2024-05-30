<?php

namespace App\Contracts\Repositories;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Contracts\Interfaces\FaqInterface;

class FaqRepository extends BaseRepository implements FaqInterface
{
    public function __construct(Faq $faq)
    {
        $this->model = $faq;
    }

    public function customPaginate(Request $request, int $pagination = 10): mixed
    {
        return $this->model->query()->paginate($pagination);
    }

    public function show(mixed $id): mixed
    {
        return $this->model->query()->where('product_id',$id)->get();
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

    public function ServiceProductShow(mixed $relation, mixed $id): mixed
    {
        return $this->model->query()->where($relation, $id)->get();
    }
    public function search(Request $request): mixed
    {
        return $this->model->query()
            ->when($request->question, function ($query) use ($request) {
                $query->where('question', 'LIKE', '%' . $request->question . '%');
            })
            ->get();
    }
}
