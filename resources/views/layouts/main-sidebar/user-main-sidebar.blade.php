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
            {{-- <li> <a href="{{ route('user.DevicesMedical') }}">عرض الأجهزة الطبية</a> </li> --}}
        </li>
        <!-- menu title -->
        <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">نظام RMB الأدارة طلبات الصبانة </li>
        <!-- menu item Elements-->


        @canany(['View-Deives', 'قائمة أجهزة تكنولوجيا المعلومات', 'قائمة الأجهزة الطبية', 'قائمة جميع الأجهزة', 'Dep-Medical'])

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
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#maintenances-level1">قائمة
                                الأجهزة<div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="maintenances-level1" class="collapse">

                                {{-- @can('Index-Deives')
                                    <li> <a href="{{ route('admin.viewdevice') }}">عرض الأجهزة </a> </li>
                                @endcan --}}

                                @can('قائمة الأجهزة الطبية')
                                    <li> <a href="{{ route('user.DevicesMedical') }}">عرض الأجهزة الطبية</a> </li>
                                @endcan


                                @can('قائمة أجهزة تكنولوجيا المعلومات')
                                    {{-- <li> <a href="{{ route('admin.DevicesIt') }}">عرض أجهزة تكنولوجيا المعلومات</a>
                                    </li> --}}
                                    <li> <a href="{{ route('user.DevicesIt') }}">عرض أجهزة تكنولوجيا المعلومات</a> </li>
                                @endcan



                            </ul>
                        </li>
                        @canany(['قائمة طلبات الصيانة', 'View-R-Man.', 'عرض طلبات تكنولوجيا المعلومات', 'عرض طلبات الأجهزة الطبية'])
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#maintenances-level4">تذاكر
                                    الصيانة<div class="pull-right">
                                        <i class="ti-plus"></i>
                                    </div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="maintenances-level4" class="collapse">
                                    @can('Index-R-Man.')
                                        <li> <a href="#">عرض جميع التذاكر</a>
                                        </li>
                                    @endcan

                                    @can('عرض طلبات الأجهزة الطبية')
                                        <li> <a href="{{ route('user.View_Request_Medical') }}">عرض تذاكر أجهزة الطبية</a>
                                        </li>
                                    @endcan

                                    @can('عرض طلبات تكنولوجيا المعلومات')
                                        <li> <a href="{{ route('user.View_Request_IT') }}">عرض تذاكر أجهزة تكنولوجيا المعلومات
                                            </a> </li>
                                    @endcan

                                </ul>
                            </li>
                        @endcanany

                    </ul>
                </li>
            @endcan
        @endcanany

        {{-- @canany(['View-Deives', 'View-IT', 'View-Medical', 'Index-Deives', 'Dep-Medical'])

            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#custom-page2">
                    <div class="pull-left"><i class="ti-menu-alt"></i><span class="right-nav-text">عرض وأدارة الاجهزة</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>


                <ul id="custom-page2" class="collapse" data-parent="#sidebarnav">

                    @can('View-Deives', 'Index-Deives')
                        <li>
                            <a href="{{ route('admin.viewdevice') }}">عرض جميع الاجهزة</a>
                        </li>
                    @endcan

                    @can('update')
                        <li> <a href="{{ route('medicalDevices') }}">عرض الأجهزة الطبية</a> </li>
                    @endcan


                    @can('View-IT')
                        <li> <a href="{{ route('deviceIt') }}">قسم تكنولوجيا المعلومات</a> </li>
                    @endcan


                    @can('View-Medical')
                        <li> <a href="{{ route('deviceMedical') }}">قسم الاجهزة الطبية</a> </li>
                    @endcan

                    @can('Dep-Medical')
                        <li> <a href="{{ route('medicalDevices') }}">قسم الهندسة والصيانة</a> </li>
                    @endcan

                </ul>

            </li>
        @endcanany --}}


        <!-- menu item Ticket-->
        @canany(['أنشاء طلب صيانة'])
            <li>
                {{-- <a href="{{ route('maintenances.create') }}"><i class="ti-comments"></i><span --}}
                <a href="{{ route('user.Device_It.create') }}"><i class="ti-comments"></i><span class="right-nav-text">أنشاء
                        تذكرة</span></a>
            </li>
        @endcanany

    </ul>
</div>
