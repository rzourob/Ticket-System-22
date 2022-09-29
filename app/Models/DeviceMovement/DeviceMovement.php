<?php

namespace App\Models\DeviceMovement;

use App\Models\Device\Device;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceMovement extends Model
{
    use HasFactory;

    public function device()
    {
        // return $this->belongsToMany(MaintenanceRequest::class ,'maintenancerequest_id' ,'id');

        // return $this->hasMany(MaintenanceRequest::class );

        return $this->belongsTo(Device::class ,'device_id' ,'id');

    }
}
