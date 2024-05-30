<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface HasCategory {
    /**
     * category
     *
     * @return BelongsTo
     */
    public function category():BelongsTo;
}
