<?php

namespace App\Models\SubDepartment;

use App\Models\Department\Department;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubDepartment extends Model
{
    use HasFactory;

    public function getActivityAttribute()
    {
        return $this->active ? "مفعل" : "غير مفعل";
    }


    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    
public function sudepartment(){

    return $this->belongsTo(SubDepartment::class);
}
    
}
