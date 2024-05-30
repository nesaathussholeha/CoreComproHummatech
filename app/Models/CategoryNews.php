<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CategoryNews extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Category News relation back
     *
     * @author @cakadi190
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(NewsCategory::class , 'category_id');
    }
}
