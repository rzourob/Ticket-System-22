<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //أضافة مدير للنظام
        Permission::create(['name' => 'أضافة مدير', 'guard_name' => 'admin']);
        Permission::create(['name' => 'تعديل بيانات مدير', 'guard_name' => 'admin']);
        Permission::create(['name' => 'عرض قائمة حسابات المدراء', 'guard_name' => 'admin']);
        Permission::create(['name' => 'حذف حساب مدير', 'guard_name' => 'admin']);

        //أضافة رئيس قسم للنظام
        Permission::create(['name' => 'أضافة رئيس قسم', 'guard_name' => 'admin']);
        Permission::create(['name' => 'تعديل بيانات رئيس قسم', 'guard_name' => 'admin']);
        Permission::create(['name' => 'عرض قائمة حسابات رئساء الأقسام', 'guard_name' => 'admin']);
        Permission::create(['name' => 'حذف حساب رئيس قسم', 'guard_name' => 'admin']);

        //أضافة رئيس قسم للنظام
        Permission::create(['name' => 'أضافة جهازجديد', 'guard_name' => 'admin']);
        Permission::create(['name' => 'تعديل بيانات جهاز', 'guard_name' => 'admin']);
        Permission::create(['name' => 'عرض قائمةالأجهزة', 'guard_name' => 'admin']);
        Permission::create(['name' => 'حذف جهاز', 'guard_name' => 'admin']);
        Permission::create(['name' => 'View-Deives', 'guard_name' => 'admin']);

        //أضافة مسؤوليات
        Permission::create(['name' => 'أضافة مسؤولية', 'guard_name' => 'admin']);
        Permission::create(['name' => 'تعديل بيانات مسؤولية', 'guard_name' => 'admin']);
        Permission::create(['name' => 'عرض قائمة المسؤوليات', 'guard_name' => 'admin']);
        Permission::create(['name' => 'حذف مسؤولية', 'guard_name' => 'admin']);

        //أضافة صلاحيات
        Permission::create(['name' => 'أضافة صلاحية', 'guard_name' => 'admin']);
        Permission::create(['name' => 'تعديل بيانات صلاحية', 'guard_name' => 'admin']);
        Permission::create(['name' => 'عرض قائمة الصلاحيات', 'guard_name' => 'admin']);
        Permission::create(['name' => 'حذف صلاحية', 'guard_name' => 'admin']);

        //أضافة صلاحيات
        Permission::create(['name' => 'View-IT', 'guard_name' => 'admin']);
        Permission::create(['name' => 'View-Medical', 'guard_name' => 'admin']);
        Permission::create(['name' => 'View-Subdepartments', 'guard_name' => 'admin']);

        //أضافة صلاحيات
        Permission::create(['name' => 'Index-R-Man.', 'guard_name' => 'admin']);

        //أضافة صلاحيات
        Permission::create(['name' => 'View-R-Man.', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Delete-R-Man.', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Edit-R-Man.	', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Create-R-Man.-IT', 'guard_name' => 'admin']);

        //أضافة صلاحيات
        Permission::create(['name' => 'Create-R-Man.-Medical', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Dep-Medical', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Create-Request	', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Detiles-Deives', 'guard_name' => 'admin']);

        //أضافة صلاحيات
        Permission::create(['name' => 'Movements-Deives', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Detiles', 'guard_name' => 'admin']);

        //أضافة قسم للنظام
        Permission::create(['name' => 'View-departments', 'guard_name' => 'admin']);
        Permission::create(['name' => 'تعديل بيانات قسم', 'guard_name' => 'admin']);
        Permission::create(['name' => 'حذف قسم', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Show-departments', 'guard_name' => 'admin']);


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
