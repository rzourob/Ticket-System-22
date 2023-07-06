<?php

namespace App\Policies\Department_Policy;

use App\Models\Admin;
use App\Models\Department\Department;
use Illuminate\Auth\Access\HandlesAuthorization;

class DepartmentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Admin $admin)
    {
        //
        return $admin->hasPermissionTo('View-departments') 
        ? $this->allow()
        : $this->deny();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Department\Department  $department
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view($actor, Department $department)
    {
        //
        return $actor->hasPermissionTo('View-departments') 
        ? $this->allow()
        : $this->deny();
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Admin $admin)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Department\Department  $department
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Admin $admin, Department $department)
    {
        //
        return $admin->hasPermissionTo('Edit-departments') 
        ? $this->allow()
        : $this->deny();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Department\Department  $department
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Admin $admin, Department $department)
    {
        //
        return $admin->hasPermissionTo('Destroy-departments') 
        ? $this->allow()
        : $this->deny();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Department\Department  $department
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $admin, Department $department)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Department\Department  $department
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $admin, Department $department)
    {
        //
    }
}
