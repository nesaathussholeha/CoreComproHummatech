<?php

namespace App\Observers;

use App\Models\Faq;
use Faker\Provider\Uuid;

class FaqObserver
{

    public function creating(Faq $faq): void
    {
        $faq->id =Uuid::uuid();
    }
    /**
     * Handle the Faq "created" event.
     */
    public function created(Faq $faq): void
    {

    }

    /**
     * Handle the Faq "updated" event.
     */
    public function updated(Faq $faq): void
    {
        //
    }

    /**
     * Handle the Faq "deleted" event.
     */
    public function deleted(Faq $faq): void
    {
        //
    }

    /**
     * Handle the Faq "restored" event.
     */
    public function restored(Faq $faq): void
    {
        //
    }

    /**
     * Handle the Faq "force deleted" event.
     */
    public function forceDeleted(Faq $faq): void
    {
        //
    }
}
