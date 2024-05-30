<?php

namespace App\Services;

use App\Models\Sale;
use App\Enums\TypeEnum;
use App\Models\Product;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use App\Models\ProductFeature;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateSaleRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\StoreProductCompanyRequest;
use App\Http\Requests\UpdateProductCompanyRequest;
use App\Contracts\Interfaces\ProductFeatureInterface;
use App\Http\Requests\StoreComingSoonProductRequest;
use App\Http\Requests\UpdateComingSoonProductRequest;
use App\Models\ComingSoonProduct;

class ProductService
{
    use UploadTrait;

    private ProductFeatureInterface $productFeature;

    public function __construct(ProductFeatureInterface $productFeature)
    {
        $this->productFeature = $productFeature;
    }

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
    public function store(StoreProductRequest $request): array|bool
    {
        $data = $request->validated();

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'slug' => Str::slug($request->name),
            'link' => $request->link,
            'service_id' => $request->service_id,
            'type' => $request->type,
            'category_product_id' => $request->category_product_id
        ];
        // dd($data);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $data['image'] = $request->file('image')->store($data['name'], TypeEnum::PRODUCT->value, 'public');
            return $data;
        }
        return $data;
    }

    public function storeCompany(StoreProductCompanyRequest $request): array|bool
    {
        $data = $request->validated();

        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'link' => $request->link,
            'type' => $request->type,
            'category_product_id' => $request->category_product_id
        ];
        // dd($data);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $data['image'] = $request->file('image')->store($data['name'], TypeEnum::PRODUCT->value, 'public');
            return $data;
        }
        return $data;
    }

    public function storefeaturecompany(StoreProductCompanyRequest $request, $product_id)
    {
        // dd($product_id->id);
        foreach ($request->feature as $index => $item) {
            $data = [
                'product_id' => $product_id->id,
                'title' => $request->feature[$index]
            ];
            $this->productFeature->store($data);
        }
    }

    public function storefeature(StoreProductRequest $request, $product_id)
    {
        // dd($product_id->id);
        foreach ($request->feature as $index => $item) {
            $data = [
                'product_id' => $product_id->id,
                'description' => $item,
                'title' => $request->title[$index]
            ];
            $this->productFeature->store($data);
        }
    }

    public function updatefeature(UpdateProductRequest $request, $product)
    {
        // dd($product_id->id);
        foreach ($request->feature as $index => $item) {
            $data = [
                'product_id' => $product->id,
                'description' => $item,
                'title' => $request->title[$index]
            ];
            $this->productFeature->store($data);
        }
    }

    public function updatefeaturecompany(UpdateProductCompanyRequest $request, $product)
    {
        // dd($product_id->id);
        foreach ($request->feature as $index => $item) {
            $data = [
                'product_id' => $product->id,
                'title' => $request->feature[$index]
            ];
            $this->productFeature->store($data);
        }
    }

    /**
     * Handle update data event to models.
     *
     * @param Sale $sale
     * @param UpdateSaleRequest $request
     *
     * @return array|bool
     */
    public function update(Product $product, UpdateProductRequest $request): array|bool
    {
        $data = $request->validated();
        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'link' => $request->link,
            'service_id' => $request->service_id,
            'type' => $request->type,
            'category_product_id' => $request->category_product_id
        ];
        // dd($data);
        if ($request->has('image')) {
            $this->remove($product->image);
            $data['image'] = $request->file('image')->store($data['name'], TypeEnum::PRODUCT->value, 'public');
        } else {
            $data['image'] = $product->image;
        }

        foreach ($request->id_feature as $fitur)
        {
            $this->productFeature->delete($fitur);
        }

        return $data;
    }

    public function updateCompany(Product $product, UpdateProductCompanyRequest $request): array|bool
    {
        $data = $request->validated();
        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'link' => $request->link,
            'type' => $request->type,
            'category_product_id' => $request->category_product_id
        ];
        // dd($data);
        if ($request->has('image')) {
            $this->remove($product->image);
            $data['image'] = $request->file('image')->store($data['name'], TypeEnum::PRODUCT->value, 'public');
        } else {
            $data['image'] = $product->image;
        }

        foreach ($request->id_feature as $fitur)
        {
            $this->productFeature->delete($fitur);
        }

        return $data;
    }
    public function delete(Product $product)
    {
        $this->remove($product->image);
    }

    public function storeComing(StoreComingSoonProductRequest $request): array|bool
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($request->name);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $data['image'] = $request->file('image')->store($data['name'], TypeEnum::PRODUCT->value, 'public');
            return $data;
        }
        return $data;
    }

    public function updateComing(ComingSoonProduct $comingSoonProduct, UpdateComingSoonProductRequest $request): array|bool
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($request->name);

        if ($request->has('image')) {
            $this->remove($comingSoonProduct->image);
            $data['image'] = $request->file('image')->store($data['name'], TypeEnum::PRODUCT->value, 'public');
        } else {
            $data['image'] = $comingSoonProduct->image;
        }

        return $data;
    }

    public function deleteComing(ComingSoonProduct $comingSoonProduct)
    {
        $this->remove($comingSoonProduct->image);
    }
}
