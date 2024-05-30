<?php

namespace App\Observers;

use App\Models\NewsCategory;
use Faker\Provider\Uuid;

class NewsCategoryObserver
{
    /**
     * Handle the NewsCategory "creating" event.
     */
    public function creating(NewsCategory $newsCategory): void
    {
        $newsCategory->id = Uuid::uuid();
    }
    /**
     * Handle the NewsCategory "created" event.
     */
    public function created(NewsCategory $newsCategory): void
    {
        //
    }

    /**
     * Handle the NewsCategory "updated" event.
     */
    public function updated(NewsCategory $newsCategory): void
    {
        //
    }

    /**
     * Handle the NewsCategory "deleted" event.
     */
    public function deleted(NewsCategory $newsCategory): void
    {
        //
    }

    /**
     * Handle the NewsCategory "restored" event.
     */
    public function restored(NewsCategory $newsCategory): void
    {
        //
    }

    /**
     * Handle the NewsCategory "force deleted" event.
     */
    public function forceDeleted(NewsCategory $newsCategory): void
    {
        //
    }
}
