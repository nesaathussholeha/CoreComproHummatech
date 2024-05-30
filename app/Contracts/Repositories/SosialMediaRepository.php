<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\SosialMediaInterface;
use App\Models\SosialMedia;
use Illuminate\Http\Request;

class SosialMediaRepository extends BaseRepository implements SosialMediaInterface
{
    public function __construct(SosialMedia $sosialMedia)
    {
        $this->model = $sosialMedia;
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
        ->when($request->platform, function ($query) use ($request) {
            $query->where('platform', 'LIKE', '%' . $request->platform . '%');
        })->get();
    }
    public function instagram(): mixed
    {
        return $this->model->query()->where('platform', 'Instagram')->first();
    }
}
