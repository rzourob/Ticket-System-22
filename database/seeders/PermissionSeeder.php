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

        //أضافة جهاز للنظام
        Permission::create(['name' => 'أضافة جهازجديد', 'guard_name' => 'admin']);
        Permission::create(['name' => 'تعديل بيانات جهاز', 'guard_name' => 'admin']);
        Permission::create(['name' => 'عرض قائمةالأجهزة', 'guard_name' => 'admin']);
        Permission::create(['name' => 'حذف جهاز', 'guard_name' => 'admin']);
        Permission::create(['name' => 'View-Deives', 'guard_name' => 'admin']);

        //أضافة مسؤوليات
        Permission::create(['name' => 'أضافة مسؤولية', 'guard_name' => 'admin']);
        Permission::create(['name' => 'تعديل مسؤولية', 'guard_name' => 'admin']);
        Permission::create(['name' => 'عرض قائمة المسؤوليات', 'guard_name' => 'admin']);
        Permission::create(['name' => 'حذف مسؤولية', 'guard_name' => 'admin']);

        //أضافة صلاحيات
        Permission::create(['name' => 'أضافة صلاحية', 'guard_name' => 'admin']);
        Permission::create(['name' => 'تعديل صلاحية', 'guard_name' => 'admin']);
        Permission::create(['name' => 'عرض قائمة الصلاحيات', 'guard_name' => 'admin']);
        Permission::create(['name' => 'حذف صلاحية', 'guard_name' => 'admin']);

        // طلب تكنلوجيا المعلومات الصيانة
        Permission::create(['name' => 'عرض طلبات تكنولوجيا المعلومات', 'guard_name' => 'admin']);
        Permission::create(['name' => 'حذف طلبات تكنولوجيا المعلومات', 'guard_name' => 'admin']);
        Permission::create(['name' => 'تعديل طلبات تكنولوجيا المعلومات', 'guard_name' => 'admin']);
        Permission::create(['name' => 'أنشاء طلبات تكنولوجيا المعلومات', 'guard_name' => 'admin']);

        // طلب تكنلوجيا المعلومات الصيانة
        Permission::create(['name' => 'عرض طلبات الأجهزة الطبية ', 'guard_name' => 'admin']);
        Permission::create(['name' => 'حذف طلبات الأجهزة الطبية ', 'guard_name' => 'admin']);
        Permission::create(['name' => 'تعديل طلبات الأجهزة الطبية ', 'guard_name' => 'admin']);
        Permission::create(['name' => 'أنشاء طلبات الأجهزة الطبية ', 'guard_name' => 'admin']);

        //أضافة قسم للنظام
        Permission::create(['name' => 'أضافة قسم', 'guard_name' => 'admin']);
        Permission::create(['name' => 'تعديل قسم', 'guard_name' => 'admin']);
        Permission::create(['name' => 'حذف قسم', 'guard_name' => 'admin']);
        Permission::create(['name' => 'عرض قسم', 'guard_name' => 'admin']);

        //أضافة وحدة للنظام
        Permission::create(['name' => 'أضافة وحدة', 'guard_name' => 'admin']);
        Permission::create(['name' => 'تعديل وحدة', 'guard_name' => 'admin']);
        Permission::create(['name' => 'حذف وحدة', 'guard_name' => 'admin']);
        Permission::create(['name' => 'عرض وحدة', 'guard_name' => 'admin']);

        //أضافة صلاحيات
        Permission::create(['name' => 'View-IT', 'guard_name' => 'admin']);
        Permission::create(['name' => 'View-Medical', 'guard_name' => 'admin']);
        Permission::create(['name' => 'View-Subdepartments', 'guard_name' => 'admin']);

        //أضافة صلاحيات
        Permission::create(['name' => 'Index-R-Man.', 'guard_name' => 'admin']);

        //طلب الاجهزة الطبية صلاحيات
        Permission::create(['name' => 'Create-R-Man.-Medical', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Dep-Medical', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Create-Request	', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Detiles-Deives', 'guard_name' => 'admin']);

        //أضافة صلاحيات
        Permission::create(['name' => 'Movements-Deives', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Detiles', 'guard_name' => 'admin']);




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
