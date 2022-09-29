<?php

namespace App\Models\Comment;

use App\Models\Maintenance\MaintenanceRequest;
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
}
