<?php

namespace App\Models;

use App\Models\Comment\Comment;
use App\Models\Department\Department;
use App\Models\Maintenance\MaintenanceRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable , HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'password','role_id','status', 'image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
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

    public function comment()
    {
        // return $this->belongsToMany(MaintenanceRequest::class ,'maintenancerequest_id' ,'id');

        // return $this->hasMany(MaintenanceRequest::class );

        return $this->hasMany(Comment::class ,'comment_id' ,'id');

    }

    public function maintenancerequest()
    {
        // return $this->belongsToMany(MaintenanceRequest::class ,'maintenancerequest_id' ,'id');

        // return $this->hasMany(MaintenanceRequest::class );

        return $this->hasMany(MaintenanceRequest::class ,'maintenancerequest_id' ,'id');

    }

    public function routeNotificationForMail($notification = null)
    {
        return $this->email;
    }
}
