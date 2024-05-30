<?php

namespace App\Services;

use App\Enums\TypeEnum;
use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\StoreVacancyRequest;
use App\Http\Requests\UpdateTestimonialRequest;
use App\Http\Requests\UpdateVacancyRequest;
use App\Models\Testimonial;
use App\Models\Vacancy;
use App\Traits\UploadTrait;

class VacancyService
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

    public function store(StoreVacancyRequest $request): array|bool
    {
        $data = $request->validated();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $data['image'] = $request->file('image')->store($data['title'], TypeEnum::VACANCY->value, 'public');
            return $data;
        }
        return false;
    }

    public function update(Vacancy $vacancy, UpdateVacancyRequest $request): array|bool
    {
        $data = $request->validated();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $this->remove($vacancy->image);
            $data['image'] = $request->file('image')->store($data['title'], TypeEnum::VACANCY->value, 'public');
        } else {
            $data['image'] = $vacancy->image;
        }

        return $data;
    }
}
