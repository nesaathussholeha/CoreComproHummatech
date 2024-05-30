<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\CategoryProductInterface;
use App\Contracts\Interfaces\ShopInterface;
use App\Models\CategoryProduct;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopRepository extends BaseRepository implements ShopInterface
{
    public function __construct(Shop $shop)
    {
        $this->model = $shop;
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
            })
            ->get();
    }
}
