<?php

namespace App\Observers;

use App\Models\SalesPackage;
use Faker\Provider\Uuid;

class SalesPackageObserver
{
    public function creating(SalesPackage $salesPackage): void
    {
        $salesPackage->id = Uuid::uuid();
    }

    /**
     * Handle the SalesPackage "created" event.
     */
    public function created(SalesPackage $salesPackage): void
    {
        //
    }

    /**
     * Handle the SalesPackage "updated" event.
     */
    public function updated(SalesPackage $salesPackage): void
    {
        //
    }

    /**
     * Handle the SalesPackage "deleted" event.
     */
    public function deleted(SalesPackage $salesPackage): void
    {
        //
    }

    /**
     * Handle the SalesPackage "restored" event.
     */
    public function restored(SalesPackage $salesPackage): void
    {
        //
    }

    /**
     * Handle the SalesPackage "force deleted" event.
     */
    public function forceDeleted(SalesPackage $salesPackage): void
    {
        //
    }
}
