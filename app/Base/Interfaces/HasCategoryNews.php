<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface HasCategoryNews {
    public function categoryNews(): BelongsTo;
}
