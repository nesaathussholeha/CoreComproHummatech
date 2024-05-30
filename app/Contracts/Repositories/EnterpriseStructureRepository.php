<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\EnterpriseStructureInterface;
use App\Models\EnterpriseStructure;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class EnterpriseStructureRepository extends BaseRepository implements EnterpriseStructureInterface
{
    public function __construct(EnterpriseStructure $enterpriseStructure)
    {
        $this->model = $enterpriseStructure;
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
}
