<?php

namespace App\Services;

use App\Enums\TypeEnum;
use App\Http\Requests\StoreOrganizationRequest;
use App\Http\Requests\UpdateOrganizationRequest;
use App\Models\Organization;
use App\Traits\UploadTrait;

class OrganizationService
{
    use UploadTrait;

    public function validateAndUpload(string $disk, object $file, string $old_file = null): string
    {
        if ($old_file) $this->remove($old_file);

        return $this->upload($disk, $file);
    }

    public function store(StoreOrganizationRequest $request): array|bool
    {
        $data = $request->validated();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $data['image'] = $request->file('image')->store(TypeEnum::ORGANIZATION->value, 'public');
            return $data;
        }
        return false;
    }

    public function update(Organization $organization, UpdateOrganizationRequest $request): array|bool
    {
        $data = $request->validated();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $this->remove($organization->image);
            $data['image'] = $request->file('image')->store(TypeEnum::ORGANIZATION->value, 'public');
        } else {
            $data['image'] = $organization->image;
        }

        return $data;
    }
}
