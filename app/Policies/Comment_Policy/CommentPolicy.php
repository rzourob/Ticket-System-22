<?php

namespace App\Policies\Comment_Policy;

use App\Models\Admin;
use App\Models\Comment\Comment;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
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
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Comment\Comment  $comment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Admin $admin, Comment $comment)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create($actor)
    {
        //
        return $actor->hasPermissionTo('') 
        ? $this->allow()
        : $this->deny();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Comment\Comment  $comment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Admin $admin, Comment $comment)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Comment\Comment  $comment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Admin $admin, Comment $comment)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Comment\Comment  $comment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $admin, Comment $comment)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Comment\Comment  $comment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $admin, Comment $comment)
    {
        //
    }
}
