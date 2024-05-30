<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\ContactUsInterface;
use App\Models\ContactUs;

class ContactUsRepository extends BaseRepository implements ContactUsInterface
{
    public function __construct(ContactUs $contactUs)
    {
        $this->model = $contactUs;
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
    public function GetCount(): mixed
    {
        return $this->model->query()->count();
    }
}
