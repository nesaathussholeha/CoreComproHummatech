<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\MisionItemsInterface;
use App\Contracts\Interfaces\NewsImageInterface;
use App\Models\MisionItems;
use App\Models\NewsImage;

class MisionItemsRepository extends BaseRepository implements MisionItemsInterface {
    public function __construct(MisionItems $newsImage)
    {
        $this->model = $newsImage;
    }

    public function get(): mixed
    {
        return $this->model->query()->get();
    }

    /**
     * store
     *
     * @param  mixed $data
     * @return mixed
     */
    public function store(array $data): mixed
    {
        return $this->model->query()
            ->create($data);
    }

    /**
     * delete
     *
     * @param  mixed $id
     * @return mixed
     */
    public function delete(mixed $id): mixed
    {
        return $this->model->query()
            ->findOrFail($id)
            ->delete();
    }

    public function where(mixed $slug) : mixed
    {
        return $this->model->where('service_id', $slug);
    }

}
