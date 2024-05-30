<?php

namespace App\Models;

use App\Base\Interfaces\HasCategory;
use App\Base\Interfaces\HasNews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NewsCategory extends Model implements HasCategory, HasNews
{
    use HasFactory;

    protected $table = 'news_categories';
    protected $fillable = ['news_id', 'category_id'];
    protected $guarded = [];

    /**
     * This relation to News Data
     *
     * @return BelongsTo
     */
    public function news(): BelongsTo
    {
        return $this->belongsTo(News::class);
    }

    /**
     * This relation to Category Data
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(CategoryNews::class, 'category_id');
    }


}
