<?php

namespace App\Services;

use App\Enums\TypeEnum;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Profile;
use App\Traits\UploadTrait;

class ProfileService
{
    use UploadTrait;

    /**
     * Validasi dan unggah file, hapus file lama jika ada.
     *
     * @param string      $disk
     * @param object      $file
     * @param string|null $old_file
     * @return string
     */
    public function validateAndUpload(string $disk, object $file, ?string $old_file = null): string
    {
        if ($old_file) {
            $this->remove($old_file);
        }

        return $this->upload($disk, $file);
    }

    /**
     * Simpan data profil baru.
     *
     * @param StoreProfileRequest $request
     * @return array|bool
     */
    public function store(StoreProfileRequest $request): array|bool
    {
        $data = $request->validated();
        $image = $request->hasFile('image') && $request->file('image')->isValid();
        // $proposal = $request->hasFile('proposal') && $request->file('proposal')->isValid();

        if ($image) {
            $data['image'] = $request->file('image')->store($data['title'], TypeEnum::PROFILE->value, 'public');
            // $data['proposal'] = $request->file('proposal')->store(TypeEnum::PROFILE->value, 'public');
            return $data;
        }

        return false;
    }

    /**
     * Perbarui data profil yang sudah ada.
     *
     * @param Profile             $profile
     * @param UpdateProfileRequest $request
     * @return array|bool
     */
    public function update(Profile $profile, UpdateProfileRequest $request): array|bool
    {
        $data = $request->validated();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            if ($profile->image != NULL) {
                $this->remove($profile->image);
            }

            // if ($request->hasFile('proposal') && $request->file('proposal')->isValid()) {
            //     if ($profile->proposal != NULL) {
            //         $this->remove($profile->proposal);
            //     }
            //     $data['proposal'] = $request->file('proposal')->store(TypeEnum::PROFILE->value, 'public');
            // } else {
            //     $data['proposal'] = $profile->proposal;
            // }

            $data['image'] = $request->file('image')->store($data['title'], TypeEnum::PROFILE->value, 'public');
        } else {
            $data['image'] = $profile->image;
        }

        return $data;
    }
}
