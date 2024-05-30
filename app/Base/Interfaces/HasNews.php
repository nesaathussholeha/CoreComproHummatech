<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface HasNews {
    /**
     * news
     *
     * @return BelongsTo
     */
    public function news(): BelongsTo;
}
