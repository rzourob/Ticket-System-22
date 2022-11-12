<?php

namespace App\Models\Device;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceAttachment extends Model
{
    use HasFactory;


    public function device()
    {
        return $this->belongsTo(Device::class, 'device_id', 'id');
    }

    // public function patient()
    // {
    //     return $this->belongsTo(Patient::class, 'patient_id', 'id');
    // }

}
