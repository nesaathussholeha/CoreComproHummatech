<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $keyType = 'char';
    public $incrementing = false;

    protected $fillable = [
        'question',
        'answer',
        'service_id',
        'product_id',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
