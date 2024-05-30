<?php

namespace App\Models;

use App\Base\Interfaces\HasNews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NewsImage extends Model implements HasNews
{
    use HasFactory;
    protected $table = 'news_images';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $keyType = 'char';

    protected $fillable = ['news_id', 'photo'];
    protected $guarded = [];

    /**
     * news
     *
     * @return BelongsTo
     */
    public function news(): BelongsTo
    {
        return $this->belongsTo(News::class, 'news_id');
    }
}
