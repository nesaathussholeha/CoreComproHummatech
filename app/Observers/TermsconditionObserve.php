<?php

namespace App\Observers;

use Faker\Provider\Uuid;
use App\Models\Termscondition;

class TermsconditionObserve
{
    public function creating(Termscondition $termscondition)
    {
        $termscondition->id = Uuid::uuid();
    }
    /**
     * Handle the Termscondition "created" event.
     */
    public function created(Termscondition $termscondition): void
    {
        //
    }

    /**
     * Handle the Termscondition "updated" event.
     */
    public function updated(Termscondition $termscondition): void
    {
        //
    }

    /**
     * Handle the Termscondition "deleted" event.
     */
    public function deleted(Termscondition $termscondition): void
    {
        //
    }

    /**
     * Handle the Termscondition "restored" event.
     */
    public function restored(Termscondition $termscondition): void
    {
        //
    }

    /**
     * Handle the Termscondition "force deleted" event.
     */
    public function forceDeleted(Termscondition $termscondition): void
    {
        //
    }
}
