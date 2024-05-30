<?php

namespace App\Services;

use App\Models\Termscondition;
use App\Http\Requests\StoreTermsconditionRequest;
use App\Http\Requests\UpdateTermsconditionRequest;

class TermsconditionService
{
    public function store(StoreTermsconditionRequest $request)
    {
        $data = [];

        foreach ($request->termcondition as $key => $value) {
            $data[] = [
                'service_id' => $request->service_id,
                'termcondition' => $value,
        ];
        }

        return $data;
    }
}
