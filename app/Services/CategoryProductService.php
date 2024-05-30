<?php

namespace App\Services;

use App\Http\Requests\StoreCategoryProductRequest;
use App\Http\Requests\UpdateCategoryProductRequest;
use App\Models\CategoryProduct;
use Illuminate\Support\Str;


class CategoryProductService
{
    /**
     * Handle store data event to models.
     *
     * @param StoreSaleRequest $request
     *
     * @return array|bool
     */
    public function store(StoreCategoryProductRequest $request): array|bool
    {
        $data = $request->validated();

        $data['slug'] = Str::slug($request->name);

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
    public function update(CategoryProduct $categoryProduct, UpdateCategoryProductRequest $request): array|bool
    {
        $data = $request->validated();

        if($request->name !== $categoryProduct->name) {
            $data['slug'] = Str::slug($request->name);
        } else {
            $data['slug'] = $categoryProduct->slug;
        }

        return $data;
    }
}
