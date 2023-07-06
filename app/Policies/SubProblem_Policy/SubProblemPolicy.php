<?php

namespace App\Policies\SubProblem_Policy;

use App\Models\Admin;
use App\Models\SubProblem\SubProblem;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubProblemPolicy
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
        return $admin->hasPermissionTo('View-SubProblem') 
        ? $this->allow()
        : $this->deny();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\SubProblem\SubProblem  $subProblem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Admin $admin, SubProblem $subProblem)
    {
        //
        return $admin->hasPermissionTo('View-SubProblem') 
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
     * @param  \App\Models\SubProblem\SubProblem  $subProblem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Admin $admin, SubProblem $subProblem)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\SubProblem\SubProblem  $subProblem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Admin $admin, SubProblem $subProblem)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\SubProblem\SubProblem  $subProblem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $admin, SubProblem $subProblem)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\SubProblem\SubProblem  $subProblem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $admin, SubProblem $subProblem)
    {
        //
    }
}
