<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        // 'Spatie\Permission\Models\Role' => 'App\Policirs\RolePolicy',
        'App\Models\SubDepartment\SubDepartment' => 'App\Policies\SubDepartment_Policy\SubDepartmentPolicy',
        'App\Models\Department\Department' => 'App\Policies\Department_Policy\DepartmentPolicy',
        'App\Models\Comment\Comment' => 'App\Policies\Comment_Policy\CommentPolicy',
        'App\Models\Problem\Problem' => 'App\Policies\Problem_Policy\ProblemPolicy',
        'App\Models\SubProblem\SubProblem' => 'App\Policies\SubProblem_Policy\SubProblemPolicy',

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
