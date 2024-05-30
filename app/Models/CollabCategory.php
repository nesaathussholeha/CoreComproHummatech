<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollabCategory extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function collab()
    {
        return $this->hasMany(CollabMitra::class);
    }
}
