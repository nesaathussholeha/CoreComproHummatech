<?php

namespace App\Services;

use App\Enums\TypeEnum;
use App\Models\MisionItems;
use App\Traits\UploadTrait;
use App\Models\VisionAndMision;
use App\Enums\VisionAndMisionEnum;
use App\Http\Requests\StoreVisionAndMisionRequest;
use App\Http\Requests\UpdateVisionAndMisionRequest;

class VisionAndMisionService
{
    public function store(StoreVisionAndMisionRequest $request)
    {
        $data[] = [
            'vision' => $request->vision,
        ];
        // dd($data);
        return $data;
    }

    public function storemision(StoreVisionAndMisionRequest $request, $useId)
    {

        if ($request->status == 'office') {
            foreach ($request->mission as $key => $value) {
                $data[] = [
                    'vision_and_mission_id' => $useId->id,
                    'mission' => $value,
                    'status' => VisionAndMisionEnum::OFFICE->value,
                ];


            }
        } else{
            foreach ($request->mission as $key => $value) {
                $data[] = [
                    'service_id' => $request->service_id,
                    'mission' => $value,
                    'status' => VisionAndMisionEnum::SERVICE->value,
                ];
            }
        }
        foreach ($data as $item){
            MisionItems::create($item);
        }
        return $data;
    }

    public function update(UpdateVisionAndMisionRequest $request)
    {

        $data[] = [
            'vision' => $request->vision,
        ];
        // dd($data);
        return $data;
    }

    public function updatemision(UpdateVisionAndMisionRequest $request, MisionItems $misionItems)
    {
        MisionItems::findOrfail($misionItems->id)->update($request->all());
    }

    public function destroy(MisionItems $misionItems)
    {
        $misionItems->delete($misionItems->id);
    }
}
