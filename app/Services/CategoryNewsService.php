<?php

namespace App\Services;

use Illuminate\Support\Str;
use App\Http\Requests\StoreCategoryNewsRequest;
use App\Http\Requests\UpdateCategoryNewsRequest;
use App\Models\CategoryNews;

class CategoryNewsService
{
    /**
     * Handle store data event to models.
     *
     * @param StoreSaleRequest $request
     *
     * @return array|bool
     */
    public function store(StoreCategoryNewsRequest $request): array|bool
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
    public function update(CategoryNews $categoryNews, UpdateCategoryNewsRequest $request): array|bool
    {
        $data = $request->validated();

        if($request->name !== $categoryNews->name) {
            $data['slug'] = Str::slug($request->name);
        } else {
            $data['slug'] = $categoryNews->slug;
        }

        return $data;
    }
}
