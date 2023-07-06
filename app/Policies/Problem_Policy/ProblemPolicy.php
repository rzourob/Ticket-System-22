<?php

namespace App\Policies\Problem_Policy;

use App\Models\Admin;
use App\Models\Problem\Problem;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProblemPolicy
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
        return $admin->hasPermissionTo('View-Problem') 
        ? $this->allow()
        : $this->deny();

    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Problem\Problem  $problem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view($actor, Problem $problem)
    {
        //
        return $actor->hasPermissionTo('View-Problem') 
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
     * @param  \App\Models\Problem\Problem  $problem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Admin $admin, Problem $problem)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Problem\Problem  $problem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Admin $admin, Problem $problem)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Problem\Problem  $problem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $admin, Problem $problem)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Problem\Problem  $problem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $admin, Problem $problem)
    {
        //
    }
}
