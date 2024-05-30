<?php

namespace App\Services;

use App\Models\Sale;
use App\Enums\TypeEnum;
use App\Models\Product;
use App\Models\Service;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateSaleRequest;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\UpdateServiceRequest;

class ServiceService
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
    public function store(StoreServiceRequest $request): array|bool
    {
        $data = $request->validated();
        // $data['slug'] = Str::slug($request->slug);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $data['image'] = $request->file('image')->store($data['name'],TypeEnum::SERVICE->value, 'public');

            if ($request->hasFile('proposal') && $request->file('proposal')->isValid()) {
                $data['proposal'] = $request->file('proposal')->store('Proposal-layanan-'.$data['name'].'-Hummatech',TypeEnum::PROPOSAL->value, 'public');
            }

            return $data;
        }
        return false;
    }

    /**
     * Handle update data event to models.
     *
     * @param Sale $sale
     * @param UpdateSaleRequest $request
     *
     * @return array|bool
     */
    public function update(Service $service, UpdateServiceRequest $request): array|bool
    {
        $data = $request->validated();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $this->remove($service->image);
            $data['image'] = $request->file('image')->store($data['name'],TypeEnum::SERVICE->value, 'public');
        } else {
            $data['image'] = $service->image;
        }

        if ($request->hasFile('proposal') && $request->file('proposal')->isValid()) {
            if ($service->proposal != null) {
                $this->remove($service->proposal);
            }
            $data['proposal'] = $request->file('proposal')->store('Proposal-layanan-'.$data['name'].'-Hummatech',TypeEnum::PROPOSAL->value, 'public');
        } else {
            $data['proposal'] = $service->proposal;
        }

        // $data['slug'] = Str::slug($request->slug);
        return $data;
    }
    public function delete(Service $service)
    {
        $this->remove($service->image);
    }
}
