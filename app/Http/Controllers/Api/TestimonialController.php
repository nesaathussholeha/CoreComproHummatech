<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Interfaces\ProductInterface;
use App\Contracts\Interfaces\ServiceInterface;
use App\Contracts\Interfaces\TestimonialInterface;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTestimonialProductRequest;
use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\UpdateTestimonialProductRequest;
use App\Http\Requests\UpdateTestimonialRequest;
use App\Http\Resources\TestimonialResource;
use App\Models\Testimonial;
use App\Services\TestimonialService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    private TestimonialInterface $testimonial;
    private TestimonialService $service;
    private ServiceInterface $serviceData;
    private ProductInterface $productData;

    public function __construct(TestimonialInterface $testimonial, TestimonialService $testimonialService, ServiceInterface $serviceData, ProductInterface $productData)
    {
        $this->service = $testimonialService;
        $this->testimonial = $testimonial;
        $this->serviceData = $serviceData;
        $this->productData = $productData;
    }

    public function index(Request $request): JsonResponse
    {
        $testimonials = $this->testimonial->customPaginate($request, 10);
        $services = $this->serviceData->get();
        $products = $this->productData->get();
        return ResponseHelper::success(TestimonialResource::collection($testimonials, $services, $products));
    }

    public function store(StoreTestimonialRequest $request): JsonResponse
    {
        $data = $this->service->store($request);
        $this->testimonial->store($data);
        return ResponseHelper::success(null, "Testimoni berhasil ditambahkan");
    }

    public function storeProduct(StoreTestimonialProductRequest $request): JsonResponse
    {
        $data = $this->service->storeProduct($request);
        $this->testimonial->store($data);
        return ResponseHelper::success(null, "Testimoni berhasil ditambahkan");
    }

    public function update(UpdateTestimonialRequest $request, Testimonial $testimonial): JsonResponse
    {
        $data = $this->service->update($testimonial, $request);
        $this->testimonial->update($testimonial->id, $data);
        return ResponseHelper::success(null, "Testimoni berhasil diperbarui");
    }

    public function updateProduct(UpdateTestimonialProductRequest $request, Testimonial $testimonial): JsonResponse
    {
        $data = $this->service->updateProduct($testimonial, $request);
        $this->testimonial->update($testimonial->id, $data);
        return ResponseHelper::success(null, "Testimoni berhasil diperbarui");
    }

    public function destroy(Testimonial $testimonial): JsonResponse
    {
        $this->testimonial->delete($testimonial->id);
        $this->service->delete($testimonial);
        return ResponseHelper::success(null, "Testimoni berhasil dihapus");
    }
}