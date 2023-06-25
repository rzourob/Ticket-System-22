<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    use HasFactory;

    public function getActivityAttribute()
    {
        return $this->active ? "مفعل" : "غير مفعل";
    }

    public function subProblems()
    {
        return $this->hasMany(SubProblem::class);
    }
}
