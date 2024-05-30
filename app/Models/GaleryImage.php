<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleryImage extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Relation to service
     *
     * @return BelongsTo
     */
    public function galery()
    {   
        return $this->belongsTo(Gallery::class);
    }
}
