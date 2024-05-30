<?php

namespace App\Services;

use App\Enums\TypeEnum;
use App\Traits\UploadTrait;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\StoreShopRequest;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\UpdateSaleRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Http\Requests\UpdateShopRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Service;
use App\Models\Shop;
use App\Models\Team;

class ShopService
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
    public function store(StoreShopRequest $request): array|bool
    {
        $data = $request->validated();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $data['image'] = $request->file('image')->store($data['name'], TypeEnum::SHOP->value, 'public');
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
    public function update(Shop $shop, UpdateShopRequest $request): array|bool
    {
        $data = $request->validated();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $this->remove($shop->image);
            $data['image'] = $request->file('image')->store($data['name'], TypeEnum::SHOP->value, 'public');
        } else {
            $data['image'] = $shop->image;
        }

        return $data;
    }

    /**
     * Handle delete data event to models.
     *
     * @param Sale $sale
     *
     * @return void
     */
    public function delete(Shop $shop)
    {
        $this->remove($shop->image);
    }
}
