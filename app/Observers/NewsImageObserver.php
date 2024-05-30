<?php

namespace App\Observers;

use App\Models\NewsImage;
use Faker\Provider\Uuid;

class NewsImageObserver
{
    /**
     * Handle the NewsImage "creating" event.
     */
    public function creating(NewsImage $newsImage): void
    {
        $newsImage->id = Uuid::uuid();
    }

    /**
     * Handle the NewsImage "created" event.
     */
    public function created(NewsImage $newsImage): void
    {
        //
    }

    /**
     * Handle the NewsImage "updated" event.
     */
    public function updated(NewsImage $newsImage): void
    {
        //
    }

    /**
     * Handle the NewsImage "deleted" event.
     */
    public function deleted(NewsImage $newsImage): void
    {
        //
    }

    /**
     * Handle the NewsImage "restored" event.
     */
    public function restored(NewsImage $newsImage): void
    {
        //
    }

    /**
     * Handle the NewsImage "force deleted" event.
     */
    public function forceDeleted(NewsImage $newsImage): void
    {
        //
    }
}
