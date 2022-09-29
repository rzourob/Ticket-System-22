<?php

namespace App\Models\Device;

use App\Models\Department\Department;
use App\Models\DeviceMovement\DeviceMovement;
use App\Models\SubDepartment\SubDepartment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    public function getActivityAttribute()
    {
        return $this->active ? "مفعل" : "غير مفعل";
    }

     public function department()
    {
        return $this->belongsTo(Department::class,'department_id','id');
    } 

    public function subDepartment()
    {
        return $this->belongsTo(SubDepartment::class );
    }

    public function deviceMovement()
    {
        // return $this->belongsToMany(Comment::class );

        // return $this->hasMany(Comment::class );

        return $this->belongsTo(DeviceMovement::class ,'device_id' ,'id')->withDefault(['id'=> 'id not found']);

    }

   
}
