<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sale extends Model
{
    use HasFactory;

    protected $keyType = 'char';
    protected $guarded = ['id'];
    public $incrementing = false;

    public function salesPackages(): HasMany
    {
        return $this->hasMany(SalesPackage::class);
    }
}