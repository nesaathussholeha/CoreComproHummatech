<?php

namespace App\Services;

use App\Enums\ProductEnum;

use App\Http\Requests\StorePortfolioRequest;
use App\Http\Requests\UpdatePortfolioRequest;
use App\Models\Product;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;

class PortfolioService
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

    public function store(StorePortfolioRequest $request): array|bool
    {
        $data = $request->validated();
        $data['type'] = 'portfolio';
        $data['slug'] = Str::slug($request->name);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $data['image'] = $request->file('image')->store($data['slug'], ProductEnum::PORTFOLIO->value, 'public');
            return $data;
        }
        return false;
    }

    public function update(Product $product, UpdatePortfolioRequest $request): array|bool
    {
        $data = $request->validated();
        $data['type'] = 'portfolio';
        $data['slug'] = Str::slug($request->name);
        
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $this->remove($product->image);
            $data['image'] = $request->file('image')->store($data['slug'], ProductEnum::PORTFOLIO->value, 'public');
        } else {
            $data['image'] = $product->image;
        }

        return $data;
    }

    public function delete(Product $product)
    {
        $this->remove($product->image);
    }
}
