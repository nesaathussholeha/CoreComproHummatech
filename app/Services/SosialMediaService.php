<?php

namespace App\Services;

use App\Enums\TypeEnum;
use App\Http\Requests\StoreSosialMediaRequest;
use App\Http\Requests\UpdateSosialMediaRequest;
use App\Models\SosialMedia;
use App\Traits\UploadTrait;

class SosialMediaService
{
    use UploadTrait;

    public function validateAndUpload(string $disk, object $file, string $old_file = null): string
    {
        if ($old_file) $this->remove($old_file);

        return $this->upload($disk, $file);
    }

    public function store(StoreSosialMediaRequest $request): array|bool
    {
        $data = $request->validated();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $data['image'] = $request->file('image')->store($data['platform'], TypeEnum::SOSIALMEDIA->value, 'public');
            return $data;
        }
        return false;
    }

    public function update(SosialMedia $partner, UpdateSosialMediaRequest $request): array|bool
    {
        $data = $request->validated();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $this->remove($partner->image);
            $data['image'] = $request->file('image')->store($data['platform'], TypeEnum::SOSIALMEDIA->value, 'public');
        } else {
            $data['image'] = $partner->image;
        }

        return $data;
    }
}
