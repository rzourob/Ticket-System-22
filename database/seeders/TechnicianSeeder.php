<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class TechnicianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       


        Permission::create(['name' => 'Create-Deives', 'guard_name' => 'technician']);
        Permission::create(['name' => 'Edit-Deives', 'guard_name' => 'technician']);
        Permission::create(['name' => 'Index-Deives', 'guard_name' => 'technician']);
        Permission::create(['name' => 'Delete-Deives', 'guard_name' => 'technician']);
        Permission::create(['name' => 'View-Deives', 'guard_name' => 'technician']);

        Permission::create(['name' => 'View-IT', 'guard_name' => 'technician']);
        Permission::create(['name' => 'View-Medical', 'guard_name' => 'technician']);

        Permission::create(['name' => 'Index-R-Man.', 'guard_name' => 'technician']);

        Permission::create(['name' => 'View-R-Man.', 'guard_name' => 'technician']);
        Permission::create(['name' => 'Delete-R-Man.', 'guard_name' => 'technician']);
        Permission::create(['name' => 'Edit-R-Man.	', 'guard_name' => 'technician']);
        Permission::create(['name' => 'Create-R-Man.-IT', 'guard_name' => 'technician']);

        Permission::create(['name' => 'Create-R-Man.-Medical', 'guard_name' => 'technician']);
        Permission::create(['name' => 'Dep-Medical', 'guard_name' => 'technician']);
        Permission::create(['name' => 'Create-Request	', 'guard_name' => 'technician']);
        Permission::create(['name' => 'Detiles-Deives', 'guard_name' => 'technician']);

        Permission::create(['name' => 'Movements-Deives', 'guard_name' => 'technician']);
        Permission::create(['name' => 'Detiles', 'guard_name' => 'technician']);


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
