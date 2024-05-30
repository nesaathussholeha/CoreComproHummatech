<?php

namespace App\Models;

use App\Base\Interfaces\HasService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Gallery extends Model implements HasService
{
    use HasFactory;

    protected $guarded = [];


    /**
     * Relation to service
     *
     * @return BelongsTo
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    /**
     * Relation to galery image
     *
     * @return BelongsTo
     */
    public function galeryImages(): HasMany
    {
        return $this->hasMany(GaleryImage::class);
    }
}
