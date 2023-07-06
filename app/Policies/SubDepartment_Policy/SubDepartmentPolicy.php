<?php

namespace App\Policies\SubDepartment_Policy;

use App\Models\Admin;
use App\Models\SubDepartment\SubDepartment;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubDepartmentPolicy
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
        return $admin->hasPermissionTo('View-Subdepartments') 
        ? $this->allow()
        : $this->deny();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\SubDepartment\SubDepartment  $subDepartment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Admin $admin, SubDepartment $subDepartment)
    {
        //
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
        return $admin->hasPermissionTo('View-Subdepartments') 
        ? $this->allow()
        : $this->deny();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\SubDepartment\SubDepartment  $subDepartment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Admin $admin, SubDepartment $subDepartment)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\SubDepartment\SubDepartment  $subDepartment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Admin $admin, SubDepartment $subDepartment)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\SubDepartment\SubDepartment  $subDepartment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $admin, SubDepartment $subDepartment)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\SubDepartment\SubDepartment  $subDepartment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $admin, SubDepartment $subDepartment)
    {
        //
    }
}
