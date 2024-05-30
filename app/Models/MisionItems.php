<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MisionItems extends Model
{
    use HasFactory;

    protected $fillable = [
        'mission',
        'vision_and_mission_id',
        'status',
        'service_id'
    ];

    public function visionAndMission()
    {
        return $this->belongsTo(MisionItems::class);
    }

}
