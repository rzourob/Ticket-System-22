<div class="scrollbar side-menu-bg">
    <ul class="nav navbar-nav side-menu" id="sidebarnav">
        <!-- menu item Dashboard-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard">
                <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">لوحة التحكم</span>
                </div>
                <div class="pull-right"></i></div>
                <div class="clearfix"></div>
            </a>
        </li>
        <!-- menu title -->
        <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">نظام RMB الأدارة طلبات الصبانة </li>
        <!-- menu item Elements-->

        @canany(['View-Deives', 'قائمة أجهزة تكنولوجيا المعلومات', 'قائمة الأجهزة الطبية', 'قائمة جميع الأجهزة',
            'Dep-Medical'])

            @can('View-Deives')
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#maintenances-level">
                        <div class="pull-left"><i class="ti-layers"></i><span class="right-nav-text">أدارة الأجهزة
                                وطلبات الصيانة</span></div>
                        <div class="pull-right"><i class="ti-plus"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="maintenances-level" class="collapse" data-parent="#sidebarnav">

                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#maintenances-level1"> قائمة
                                الأجهزة<div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="maintenances-level1" class="collapse">

                                @can('قائمة جميع الأجهزة')
                                    <li> <a href="{{ route('admin.viewdevice') }}">عرض جميع الأجهزة </a> </li>
                                @endcan

                                @can('قائمة الأجهزة الطبية')
                                    <li> <a href="{{ route('admin.DevicesMedical') }}">عرض الأجهزة الطبية</a> </li>
                                @endcan


                                @can('قائمة أجهزة تكنولوجيا المعلومات')
                                    <li> <a href="{{ route('admin.DevicesIt') }}">عرض أجهزة تكنولوجيا المعلومات</a>
                                    </li>
                                @endcan




                            </ul>
                        </li>
                        @canany([
                            'قائمة طلبات الصيانة',
                            'View-R-Man.',
                            'عرض طلبات تكنولوجيا المعلومات',
                            'عرض طلبات الأجهزة
                            الطبية',
                            ])
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#maintenances-level4"> قائمة تذاكر
                                    الصيانة<div class="pull-right">
                                        <i class="ti-plus"></i>
                                    </div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="maintenances-level4" class="collapse">

                                    @can('قائمة طلبات الصيانة')
                                        <li> <a href="{{ route('maintenances.viewDeviceMedical') }}">عرض جميع التذاكر</a>
                                        </li>
                                    @endcan

                                    @can('عرض طلبات الأجهزة الطبية')
                                        <li> <a href="{{ route('admin.Request_Device_Medical') }}">عرض تذاكر أجهزة الطبية</a>
                                        </li>
                                    @endcan

                                    @can('عرض طلبات تكنولوجيا المعلومات')
                                        <li> <a href="{{ route('admin.Request_Device_It') }}">عرض تذاكر أجهزة تكنولوجيا المعلومات
                                            </a> </li>
                                    @endcan

                                </ul>
                            </li>
                        @endcanany

                    </ul>
                </li>
            @endcan
        @endcanany

        <!-- menu item Ticket-->
        @canany(['أنشاء طلب صيانة'])
            <li>
                
                <a href="{{ route('admin.Request_Device_Medical.create') }}"><i class="ti-comments"></i><span
                        class="right-nav-text">أنشاء تذكرة</span></a>
            </li>
        @endcanany


        @canany(['أضافة مدير', 'قائمة المسؤوليات', 'قائمة الصلاحيات', 'أضافة رئيس قسم', 'أضافة فنيين'])

            <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">أدارة المسخدمين و صلاحيات</li>
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#Form">
                    <div class="pull-left"><i class="fa fa-users" aria-hidden="true"></i><span
                            class="right-nav-text">صلاحيات المستخدمين</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="Form" class="collapse" data-parent="#sidebarnav">

                    @can('قائمة الصلاحيات')
                        <li> <a href="{{ route('permissions.index') }}"><i class="fa fa-server"
                                    aria-hidden="true"></i>الصلاحيات</a> </li>
                    @endcan

                    @can('قائمة المسؤوليات')
                        <li> <a href="{{ route('roles.index') }}"><i class="fa fa-server" aria-hidden="true"></i>المسؤوليات</a>
                        </li>
                    @endcan

                    @can('أضافة رئيس قسم')
                        <li> <a href="{{ route('users.index') }}"><i class="fa fa-user-plus" aria-hidden="true"></i>أضافة رئيس
                                قسم</a> </li>
                    @endcan



                    @can('أضافة مدير')
                        <li> <a href="{{ route('admin.index') }}"><i class="fa fa-user-plus" aria-hidden="true"></i>
                                أضافة مسؤولين</a> </li>
                    @endcan

                    <li> <a href="{{ route('technicians.index') }}"><i class="fa fa-user-plus" aria-hidden="true"></i>أضافة
                            فنيين</a> </li>
                </ul>
            </li>

        @endcanany


        <!-- menu item timeline-->
        @canany(['View-departments', 'View-Subdepartments', 'Edit-departments', 'Delete-departments',
            'Show-departments', 'View-Problem', 'View-SubProblem'])
            <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">أعدادات النظام</li>
            <!-- menu item Custom pages-->
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#custom-page">
                    <div class="pull-left"><i class="fa fa-cog" aria-hidden="true"></i><span
                            class="right-nav-text">الأعدادات</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>

                <ul id="custom-page" class="collapse" data-parent="#sidebarnav">

                    <!-- menu item timeline-->

                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#custom-page11">
                            <div class="pull-left"><i class="fa fa-cog" aria-hidden="true"></i><span
                                    class="right-nav-text">أدارة الأقسام الطبية </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>

                        <ul id="custom-page11" class="collapse" data-parent="#sidebarnav11">

                            @can('View-departments')
                                <li> <a href="{{ route('departments.index') }}"><i class="fa fa-plus"
                                            aria-hidden="true"></i>أضافة
                                        قسم</a> </li>
                            @endcan

                            @can('View-Subdepartments')
                                <li> <a href="{{ route('subdepartments.index') }}"><i class="fa fa-plus"
                                            aria-hidden="true"></i>أضافة وحدة</a> </li>
                            @endcan

                        </ul>

                    </li>

                    <!-- menu item Custom pages-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#custom-page12">
                            <div class="pull-left"><i class="fa fa-cog" aria-hidden="true"></i><span
                                    class="right-nav-text">أدارة الاعطال الفنية</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>

                        <ul id="custom-page12" class="collapse" data-parent="#sidebarnav12">

                            @can('View-Problem')
                                <li> <a href="{{ route('problems.index') }}"><i class="fa fa-plus" aria-hidden="true"></i>أضافة
                                        عطل فني رئيسي</a> </li>
                            @endcan
                            @can('View-SubProblem')
                                <li> <a href="{{ route('subproblems.index') }}"><i class="fa fa-plus"
                                            aria-hidden="true"></i>أضافة عطل فني فرعي</a> </li>
                            @endcan

                        </ul>

                    </li>


                </ul>
        @endcanany

        </li>






    </ul>
</div>
