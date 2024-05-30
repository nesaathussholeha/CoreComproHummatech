<?php

namespace App\Services;

use App\Enums\TypeEnum;
use App\Http\Requests\StoreCollabMitraRequest;
use App\Http\Requests\UpdateCollabMitraRequest;
use App\Models\CollabMitra;
use App\Traits\UploadTrait;

class PartnerService
{
    use UploadTrait;

    public function validateAndUpload(string $disk, object $file, string $old_file = null): string
    {
        if ($old_file) $this->remove($old_file);

        return $this->upload($disk, $file);
    }

    public function store(StoreCollabMitraRequest $request): array|bool
    {
        $data = $request->validated();
        $data = [
            'name' => $data['name'],
            'collab_category_id' => $data['collab_category_id'],
        ];

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $data['image'] = $request->file('image')->store($request->name, TypeEnum::PARTNER->value, 'public');
            return $data;
        }
        return false;
    }

    public function update(CollabMitra $partner, UpdateCollabMitraRequest $request): array|bool
    {
        $data = $request->validated();
        $data = [
            'name' => $data['name'],
            'collab_category_id' => $data['collab_category_id'],
        ];
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $this->remove($partner->image);
            $data['image'] = $request->file('image')->store($request->name, TypeEnum::PARTNER->value, 'public');
        } else {
            $data['image'] = $partner->image;
        }

        return $data;
    }
}
