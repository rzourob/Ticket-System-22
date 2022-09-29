<?php

namespace App\Models\Department;

use App\Models\Device\Device;
use App\Models\Maintenance\MaintenanceRequest;
use App\Models\SubDepartment\SubDepartment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    public function getActivityAttribute()
    {
        return $this->active ? "مفعل" : "غير مفعل";
    }

    public function subDepartment()
    {
        return $this->hasMany(SubDepartment::class );
    }

    public function device()
    {
        return $this->hasMany(Device::class);
    }

    // public function subDepartment()
    // {
    //     return $this->hasMany(SubDepartment::class );
    // }

    public function devicee()
    {
        return $this->hasMany(Device::class);
    }

    public function maintenancerequests()
    {
        return $this->hasMany(MaintenanceRequest::class);
    }
    
}
