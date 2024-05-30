<?php

namespace App\Services;

use App\Enums\TypeEnum;
use App\Traits\UploadTrait;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\UpdateSaleRequest;
use App\Http\Requests\UpdateSectionRequest;
use App\Models\Sale;
use App\Models\Section;
use Illuminate\Support\Str;

class SectionService
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
        if ($old_file) {
            $this->remove($old_file);
        }

        return $this->upload($disk, $file);
    }

    /**
     * Handle store data event to models.
     *
     * @param StoreSaleRequest $request
     *
     * @return array|bool
     */
    public function store(StoreSectionRequest $request): array|bool
    {
        $data = $request->validated();

        $data['image'] = $this->compressImage($data['title'], $request->image, TypeEnum::SECTION->value, [
            'duplicate' => false,
            'name' => Str::slug($data['title']),
            'quality' => 50,
        ]);
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
    public function update(Section $section, UpdateSectionRequest $request): array|bool
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $this->remove($section->image);
            $data['image'] = $this->compressImage($data['title'], $request->image, TypeEnum::SECTION->value, [
                'duplicate' => false,
                'name' => Str::slug($data['title']),
                'quality' => 50,
            ]);
        } else {
            $data['image'] = $section->image;
        }
        return $data;
    }
}
