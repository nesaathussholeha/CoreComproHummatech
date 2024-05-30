<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\HasMany;

interface HasNewsImages {
    /**
     * news images
     *
     * @return HasMany
     */
    public function newsImages(): HasMany;
}
