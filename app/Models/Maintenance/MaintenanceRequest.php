<?php

namespace App\Models\Maintenance;

use App\Models\Comment\Comment;
use App\Models\Department\Department;
use App\Models\Device\Device;
use App\Models\ProblemType;
use App\Models\SubDepartment\SubDepartment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceRequest extends Model
{
    use HasFactory;
    // public function getActivityAttribute()
    // {
    //     return $this->active ? "مفعل" : "غير مفعل";
    // }

    public function getActivityAttribute()
    {
        return $this->status ? "Todo" : "Done";
    }

     public function department()
    {
        return $this->belongsTo(Department::class);
    } 

    public function problemType()
    {
        return $this->belongsTo(ProblemType::class);
    }

    public function subDepartment()
    {
        return $this->belongsTo(SubDepartment::class );
    }

    public function deviceType()
    {
        return $this->belongsTo(MaintenanceRequest::class );
    }
    
    public function device()
    {
        return $this->belongsTo(Device::class );
    }

    public function comment()
    {
        // return $this->belongsToMany(Comment::class );

        // return $this->hasMany(Comment::class );

        return $this->belongsTo(Comment::class ,'maintenancerequest_id' ,'id')->withDefault(['id'=> 'id not found']);

    }


    public function user()
    {
        // return $this->belongsToMany(Comment::class );

        // return $this->hasMany(Comment::class );

        return $this->belongsTo(User::class )->withDefault(['id'=> 'id not found']);

    }

    
}
