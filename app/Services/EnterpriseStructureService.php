<?php

namespace App\Services;

use App\Enums\TypeEnum;
use App\Http\Requests\StoreEnterpriseStructureRequest;
use App\Http\Requests\UpdateEnterpriseStructureRequest;
use App\Traits\UploadTrait;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateSaleRequest;
use App\Models\EnterpriseStructure;
use App\Models\Sale;
use Illuminate\Support\Arr;


class EnterpriseStructureService
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
    public function store(StoreEnterpriseStructureRequest $request): array|bool
    {
        $data = $request->validated();

        $data['image'] = $request->file('image')->store('Enterprise-structure', TypeEnum::ENTERPRISESTRUCTURE->value, 'public');

        // Converting products json
        $dataProducts = Arr::where($data['products'], fn($value) => !is_null($value));
        $data['products'] = $dataProducts > 0 ? json_encode($dataProducts) : json_encode([]);

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
    public function update(EnterpriseStructure $service, UpdateEnterpriseStructureRequest $request): array|bool
    {
        $data = $request->validated();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $data['image'] = $request->file('image')->store('Enterprise-structure', TypeEnum::ENTERPRISESTRUCTURE->value, 'public');
        } else {
            $data['image'] = $service->image;
        }

        // Converting products json
        $dataProducts = Arr::where($data['products'], fn($value) => !is_null($value));
        $data['products'] = $dataProducts > 0 ? json_encode($dataProducts) : json_encode([]);

        return $data;
    }
}
