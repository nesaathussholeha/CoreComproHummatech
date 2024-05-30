<?php

namespace App\Services;

use App\Contracts\Interfaces\ServiceMitraInterface;
use App\Http\Requests\StoreCollabMitraRequest;

class ServiceMitraService
{
    private ServiceMitraInterface $serviceMitra;

    public function __construct(ServiceMitraInterface $serviceMitra)
    {
        $this->serviceMitra = $serviceMitra;
    }
    public function store(StoreCollabMitraRequest $request, $collabId)
    {
        $data = $request->validated();
        if ($request->service_id) {
            foreach ($data['service_id'] as $serviceId) {
                $this->serviceMitra->store([
                    'mitra_id' => $collabId->id,
                    'service_id' => $serviceId,
                ]);
            }
        } else{
           return false;
        }
    }

    public function update($request,$collabMitra)
    {
        $data = $request->validated();
        $this->serviceMitra->delete($collabMitra->id);
        if ($request->service_id) {
            foreach ($data['service_id'] as $serviceId) {
                $this->serviceMitra->store([
                    'mitra_id' => $collabMitra->id,
                    'service_id' => $serviceId,
                ]);
            }
        } else{
           return false;
        }
    }
}
