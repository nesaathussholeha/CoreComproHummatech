<?php

namespace App\Http\Controllers\Api;

use App\Models\Termscondition;
use App\Services\TermsconditionService;
use App\Contracts\Interfaces\ServiceInterface;
use App\Http\Requests\StoreTermsconditionRequest;
use App\Http\Requests\UpdateTermsconditionRequest;
use App\Contracts\Interfaces\TermsconditionInterface;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\TermConditionResource;
use Illuminate\Http\JsonResponse;

class TermsconditionController extends Controller
{
    private TermsconditionInterface $termscondition;
    private ServiceInterface $service;
    private TermsconditionService $termsconditionService;

    public function __construct(TermsconditionInterface $termscondition, ServiceInterface $service, TermsconditionService $termsconditionService)
    {
        $this->termscondition = $termscondition;
        $this->termsconditionService = $termsconditionService;
        $this->service = $service;
    }
    
    public function index():JsonResponse
    {
        $termscondition = $this->termscondition->customPaginate(request(), 5);
        $services = $this->service->get();
        return ResponseHelper::success(TermConditionResource::collection($termscondition, $services));
    }
    
    public function store(StoreTermsconditionRequest $request): JsonResponse
    {
        $dataToStore = $this->termsconditionService->store($request);
        foreach ($dataToStore as $item) {
            $this->termscondition->store($item);
        }
        return ResponseHelper::success(null, 'Terms & Condition berhasil ditambahkan');
    }

    public function update(UpdateTermsconditionRequest $request, Termscondition $terms_condition): JsonResponse
    {
        $this->termscondition->update($terms_condition->id, $request->all());
        return ResponseHelper::success(null, 'Terms & Condition Berhasil Di Perbarui');
    }

    public function destroy(Termscondition $terms_condition): JsonResponse
    {
        $this->termscondition->delete($terms_condition->id);
        return ResponseHelper::success(null, 'Terms & Condition Berhasil Di Hapus');
    }
}
