<?php

namespace App\Models\Comment;

use App\Models\Maintenance\MaintenanceRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function maintenancerequest()
    {
        // return $this->belongsToMany(MaintenanceRequest::class ,'maintenancerequest_id' ,'id');

        // return $this->hasMany(MaintenanceRequest::class );

        return $this->belongsTo(MaintenanceRequest::class ,'maintenancerequest_id' ,'id');

    }

    public function user()
    {
        return $this->hasMany(User::class ,'user_id' ,'id');

    }
}
