<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface HasService {
    /**
     * Relation to services
     *
     * @return BelongsTo
     */
    public function service(): BelongsTo;
}
