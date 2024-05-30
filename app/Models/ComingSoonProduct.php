<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComingSoonProduct extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function CategoryProduct()
    {
        return $this->belongsTo(CategoryProduct::class);
    }
}
