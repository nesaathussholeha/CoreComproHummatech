<?php

namespace App\Services;

use App\Enums\TypeEnum;
use App\Traits\UploadTrait;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateSaleRequest;
use App\Models\Sale;

class SaleService
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
    public function store(StoreSaleRequest $request): array|bool
    {
        $data = $request->validated();
        $image = $request->hasFile('image') && $request->file('image')->isValid();
        $proposal = $request->hasFile('proposal') && $request->file('proposal')->isValid();

        if ($image && $proposal) {
            $data['image'] = $request->file('image')->store($data['name'], TypeEnum::PRODUCT->value, 'public');
            $data['proposal'] = $request->file('proposal')->store(TypeEnum::PROPOSAL->value, 'public');
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
    public function update(Sale $sale, UpdateSaleRequest $request): array|bool
    {
        $data = $request->validated();
        $image = $request->hasFile('image') && $request->file('image')->isValid();
        $proposal = $request->hasFile('proposal') && $request->file('proposal')->isValid();

        if ($image) {
            $this->remove($sale->image);
            $data['image'] = $request->file('image')->store($data['name'], TypeEnum::SALE->value, 'public');
        } else {
            $data['image'] = $sale->image;
        }

        if ($proposal) {
            $this->remove($sale->proposal);
            $data['proposal'] = $request->file('proposal')->store(TypeEnum::SALE->value, 'public');
        } else {
            $data['proposal'] = $sale->proposal;
        }


        return $data;
    }
    public function delete(Sale $sale)
    {
        $this->remove($sale->image);
    }
}
