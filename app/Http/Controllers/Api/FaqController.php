<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Interfaces\FaqInterface;
use App\Contracts\Interfaces\ProductInterface;
use App\Contracts\Interfaces\ServiceInterface;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Http\Requests\StoreFaqRequest;
use App\Http\Requests\UpdateFaqRequest;
use App\Http\Resources\FaqResource;
use Illuminate\Http\JsonResponse;

class FaqController extends Controller
{
    private FaqInterface $faq;
    private ServiceInterface $service;
    private ProductInterface $product;
    public function __construct(FaqInterface $faq, ServiceInterface $service, ProductInterface $product)
    {
        $this->faq = $faq;
        $this->service = $service;
        $this->product = $product;
    }
    public function index(): JsonResponse
    {
        $faqs = $this->faq->customPaginate(request(), 5);
        $services = $this->service->get();
        $products = $this->product->get();
        return ResponseHelper::success(FaqResource::collection($faqs, $services, $products));
    }

    public function store(StoreFaqRequest $request): JsonResponse
    {
        $this->faq->store($request->validated());
        return ResponseHelper::success(null, "FAQ berhasil ditambahkan");
    }

    public function update(UpdateFaqRequest $request, Faq $faq): JsonResponse
    {
        $this->faq->update($faq->id, $request->validated());
        return ResponseHelper::success(null, "FAQ berhasil diperbarui");
    }

    public function destroy(Faq $faq): JsonResponse
    {
        $this->faq->delete($faq->id);
        return ResponseHelper::success(null, "FAQ berhasil dihapus");
    }
}
