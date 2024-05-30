<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Termscondition extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $keyType = 'char';
    public $incrementing = false;

    protected $fillable =[
        'service_id',
        'termcondition'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
