<?php

namespace App\Services;

use App\Enums\TypeEnum;
use App\Http\Requests\StoreTestimonialProductRequest;
use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\UpdateTestimonialProductRequest;
use App\Http\Requests\UpdateTestimonialRequest;
use App\Models\Testimonial;
use App\Traits\UploadTrait;

class TestimonialService
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

    public function store(StoreTestimonialRequest $request): array|bool
    {
        $data = $request->validated();
        $data['type'] = 'service';

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $data['image'] = $request->file('image')->store($data['name'], TypeEnum::TESTIMONIAL->value, 'public');
            return $data;
        }
        return false;
    }

    public function storeProduct(StoreTestimonialProductRequest $request): array|bool
    {
        $data = $request->validated();
        $data['type'] = 'product';

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $data['image'] = $request->file('image')->store($data['name'], TypeEnum::TESTIMONIAL->value, 'public');
            return $data;
        }
        return false;
    }

    public function update(Testimonial $testimonial, UpdateTestimonialRequest $request): array|bool
    {
        $data = $request->validated();
        $data['type'] = 'service';

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $this->remove($testimonial->image);
            $data['image'] = $request->file('image')->store($data['name'], TypeEnum::TESTIMONIAL->value, 'public');
        } else {
            $data['image'] = $testimonial->image;
        }

        return $data;
    }

    public function updateProduct(Testimonial $testimonial, UpdateTestimonialProductRequest $request): array|bool
    {
        $data = $request->validated();
        $data['type'] = 'product';

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $this->remove($testimonial->image);
            $data['image'] = $request->file('image')->store($data['name'], TypeEnum::TESTIMONIAL->value, 'public');
        } else {
            $data['image'] = $testimonial->image;
        }

        return $data;
    }

    public function delete(Testimonial $testimonial)
    {
        $this->remove($testimonial->image);
    }
}
