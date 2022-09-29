<?php

namespace App\Models;

use App\Models\Department\Department;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;



class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable , HasRoles;

    protected $fillable = [
        'name', 'email', 'password','role_id','status', 'image',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'roles_name' => 'array',
    ];


    public function getActivityAttribute()
    {
        return $this->status ? "مفعل" : "غير مفعل";
    }


    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id' ,'id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
