<?php

namespace App\Observers;

use App\Models\News;
use Illuminate\Support\Str;

class NewsObserver
{
    public function creating(News $news)
    {
        $news->id = Str::uuid();
    }
}
