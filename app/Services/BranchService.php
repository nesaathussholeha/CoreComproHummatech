<?php

namespace App\Services;

use App\Http\Requests\StoreBranchRequest;
use App\Http\Requests\UpdateBranchRequest;
use App\Models\Branch;
use Illuminate\Support\Arr;

class BranchService
{
    public function updatecenter(UpdateBranchRequest $request, Branch $branch)
    {
        $center = Branch::where('type', 'center')->first();
        $data = $request->validated();

        if ($center) {
            $center->update(['type' => 'branch']);
        }
        return $data;
    }
}
