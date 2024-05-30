<?php

namespace App\Observers;

use App\Models\EnterpriseStructure;
use Illuminate\Support\Str;

class EnterpriseStructureObserver
{
    public function creating(EnterpriseStructure $enterpriseStructure)
    {
        $enterpriseStructure->id = Str::random();
    }
}
