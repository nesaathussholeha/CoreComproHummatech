<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\HasMany;

interface HasNewsCategories {
    /**
     * news categories
     *
     * @return HasMany
     */
    public function newsCategories(): HasMany;
}
