<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubProblem extends Model
{
    use HasFactory;
    public function getActivityAttribute()
    {
        return $this->active ? "مفعل" : "غير مفعل";
    }

    public function problem()
    {
        return $this->belongsTo(Problem::class);
    }

    // public function department()
    // {
    //     return $this->belongsTo(Department::class);
    // }
    // public function problemtypes(){

    //     return $this->belongsTo(SubDepartment::class);
    // }

    public function subproblem()
    {
        return $this->belongsTo(SubProblem::class );
    }
}
