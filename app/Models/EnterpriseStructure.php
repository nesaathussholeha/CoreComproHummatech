<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnterpriseStructure extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'description',
        'products',
    ];

    protected $casts = [
        'products' => 'array',
    ];

    public $autoincrement = false;
    protected $keyType = 'string';
}
