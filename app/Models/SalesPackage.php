<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SalesPackage extends Model
{
    use HasFactory;

    protected $keyType = 'char';
    protected $guarded = ['id'];
    public $incrementing = false;

    public function sale(): BelongsTo
    {
        return $this->belongsTo(Sale::class);
    }
}
