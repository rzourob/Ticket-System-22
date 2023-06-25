<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProblemType extends Model
{
    use HasFactory;

    public function getActivityAttribute()
    {
        return $this->active ? "مفعل" : "غير مفعل";
    }
    // public function subproblem()
    // {
    //     return $this->belongsTo(SubProblem::class);
    // }
    public function subProblem()
    {
        return $this->hasMany(SubProblem::class , prob);
    }
}
