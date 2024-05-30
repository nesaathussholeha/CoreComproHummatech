<?php

namespace App\Services;

use App\Enums\TypeEnum;
use App\Enums\UploadDiskEnum;
use App\Http\Requests\StoreGaleryImageRequest;
use App\Http\Requests\StoreGaleryRequest;
use App\Http\Requests\StoreGalleryRequest;
use App\Traits\UploadTrait;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateGaleryImageRequest;
use App\Http\Requests\UpdateSaleRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\GaleryImage;
use App\Models\Sale;
use App\Models\News;
use Illuminate\Support\Str;

class GaleryService
{
    use UploadTrait;

    /**
     * Handle custom upload validation.
     *
     * @param string $disk
     * @param object $file
     * @param string|null $old_file
     * @return string
     */
    public function validateAndUpload(string $disk, object $file, string $old_file = null): string
    {
        if ($old_file) $this->remove($old_file);

        return $this->upload($disk, $file);
    }

    /**
     * Handle store data event to models.
     *
     * @param StoreSaleRequest $request
     *
     * @return array|bool
     */
    public function store(StoreGaleryRequest $request): array|bool
    {
        $data = $request->validated();
        // dd($data);
        $images = [];
        foreach ($data['image'] as $image) {
            array_push($images, $image->store(UploadDiskEnum::NEWS->value, 'public'));
        }
        $data['image'] = $images;

        return $data;
    }

    /**
     * Handle update data event to models.
     *
     * @param Sale $sale
     * @param UpdateSaleRequest $request
     *
     * @return array|bool
     */
    public function update(GaleryImage $galeryImage, UpdateGaleryImageRequest $request): array|bool
    {
        $data = $request->validated();
        // dd($data);
        // dd($galeryImage);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $this->remove($galeryImage->image);
            $data['image'] = $request->file('image')->store(TypeEnum::NEWS->value, 'public');
        } else {
            $data['image'] = $galeryImage->image;
        }

        // Splitting tags data
        $array = json_decode($request->tags, true);
        $values = collect($array)->flatten()->unique()->values();

        return $data;
    }

    /**
     * Handle delete data event to models.
     *
     * @param Sale $sale
     *
     * @return void
     */
    public function delete(GaleryImage $galeryImage)
    {
        $this->remove($galeryImage->image);
    }
}
