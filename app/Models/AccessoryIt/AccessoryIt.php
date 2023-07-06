<?php

namespace App\Models\AccessoryIt;

use App\Models\Device\Device;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessoryIt extends Model
{
    use HasFactory;


    public function getActivityAttribute()
    {
        return $this->active ? "مفعل" : "غير مفعل";
    }
    
    public function device()
    {
        return $this->belongsTo(Device::class, 'device_id', 'id');
    }

    
}
