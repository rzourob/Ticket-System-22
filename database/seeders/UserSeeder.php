<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    // {
    //     //
    //     $user = User::create([
    //         'name' => 'Manuol Users',
    //         'email' => 'user@gmail.com',
    //         'password' => bcrypt('123456'),
    //         'role_id' => '2',
    //         'status' => 'مفعل',
    //     ]);

    //     $role = Role::create(['name' => 'Manuol-User','guard_name' => 'web']);

    //     $permissions = Permission::pluck('id', 'id')->all();

    //     $role->syncPermissions($permissions);

    //     $user->assignRole([$role->id]);
    // }
    {
        //
       


        Permission::create(['name' => 'Create-Deives', 'guard_name' => 'web']);
        Permission::create(['name' => 'Edit-Deives', 'guard_name' => 'web']);
        Permission::create(['name' => 'Index-Deives', 'guard_name' => 'web']);
        Permission::create(['name' => 'Delete-Deives', 'guard_name' => 'web']);
        Permission::create(['name' => 'View-Deives', 'guard_name' => 'web']);

        Permission::create(['name' => 'View-IT', 'guard_name' => 'web']);
        Permission::create(['name' => 'View-Medical', 'guard_name' => 'web']);

        Permission::create(['name' => 'Index-R-Man.', 'guard_name' => 'web']);

        Permission::create(['name' => 'View-R-Man.', 'guard_name' => 'web']);
        Permission::create(['name' => 'Delete-R-Man.', 'guard_name' => 'web']);
        Permission::create(['name' => 'Edit-R-Man.	', 'guard_name' => 'web']);
        Permission::create(['name' => 'Create-R-Man.-IT', 'guard_name' => 'web']);

        Permission::create(['name' => 'Create-R-Man.-Medical', 'guard_name' => 'web']);
        Permission::create(['name' => 'Dep-Medical', 'guard_name' => 'web']);
        Permission::create(['name' => 'Create-Request	', 'guard_name' => 'web']);
        Permission::create(['name' => 'Detiles-Deives', 'guard_name' => 'web']);

        Permission::create(['name' => 'Movements-Deives', 'guard_name' => 'web']);
        Permission::create(['name' => 'Detiles', 'guard_name' => 'web']);


        // Permission::create(['name' => 'Create-Professional', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Edit-Professional', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Index-Professional', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Professional', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Create-Customer', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Edit-Customer', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Index-Customer', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Customer', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Create-', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Edit-', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Index-', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-', 'guard_name' => 'admin']);

    }
}
