<!--=================================
 Main content -->

<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
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
                        {{-- <ul id="dashboard" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="index.html">Dashboard 01</a> </li>
                            <li> <a href="index-02.html">Dashboard 02</a> </li>
                            <li> <a href="index-03.html">Dashboard 03</a> </li>
                            <li> <a href="index-04.html">Dashboard 04</a> </li>
                            <li> <a href="index-05.html">Dashboard 05</a> </li>
                        </ul> --}}
                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">نظام RMB الأدارة طلبات الصبانة </li>
                    <!-- menu item Elements-->

                    {{-- <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">Elements</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="elements" class="collapse" data-parent="#sidebarnav">
                            <li><a href="accordions.html">Accordions</a></li>
                            <li><a href="alerts.html">Alerts</a></li>
                            <li><a href="button.html">Button</a></li>
                            <li><a href="colorpicker.html">Colorpicker</a></li>
                            <li><a href="dropdown.html">Dropdown</a></li>
                            <li><a href="lists.html">lists</a></li>
                            <li><a href="modal.html">modal</a></li>
                            <li><a href="nav.html">nav</a></li>
                            <li><a href="nicescroll.html">nicescroll</a></li>
                            <li><a href="pricing-table.html">pricing table</a></li>
                            <li><a href="ratings.html">ratings</a></li>
                            <li><a href="date-picker.html">date picker</a></li>
                            <li><a href="tabs.html">tabs</a></li>
                            <li><a href="typography.html">typography</a></li>
                            <li><a href="popover-tooltips.html">Popover tooltips</a></li>
                            <li><a href="progress.html">progress</a></li>
                            <li><a href="switch.html">switch</a></li>
                            <li><a href="sweetalert2.html">sweetalert2</a></li>
                            <li><a href="touchspin.html">touchspin</a></li>
                        </ul>
                    </li> --}}

                    <!-- menu item calendar-->

                    {{-- <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar-menu">
                            <div class="pull-left"><i class="ti-calendar"></i><span
                                    class="right-nav-text">calendar</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="calendar-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="calendar.html">Events Calendar </a> </li>
                            <li> <a href="calendar-list.html">List Calendar</a> </li>
                        </ul>
                    </li> --}}

                    <!-- menu item todo-->
                    {{-- <li>
                        <a href="#"><i class="ti-menu-alt"></i><span class="right-nav-text">عرض طلبات
                                الصيانة</span> </a>
                    </li> --}}

                    @canany(['View-Deives', 'View-IT', 'View-Medical', 'Index-Deives', 'Dep-Medical'])

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
                                        <a href="javascript:void(0);" data-toggle="collapse"
                                            data-target="#maintenances-level1">عرض أدارة الأجهزة<div class="pull-right"><i
                                                    class="ti-plus"></i></div>
                                            <div class="clearfix"></div>
                                        </a>
                                        <ul id="maintenances-level1" class="collapse">

                                            @can('Index-Deives')
                                                <li> <a href="{{ route('admin.viewdevice') }}">عرض الأجهزة </a> </li>
                                            @endcan

                                            @can('View-Medical')
                                                <li> <a href="{{ route('admin.DevicesMedical') }}">عرض الأجهزة الطبية</a> </li>
                                            @endcan


                                            {{-- @can('View-IT') --}}
                                            <li> <a href="{{ route('user.DevicesIt') }}">عرض أجهزة تكنولوجيا المعلومات</a> </li>
                                            {{-- @endcan --}}

                                            {{-- <li>
                                                    <a href="javascript:void(0);" data-toggle="collapse"
                                                        data-target="#maintenances-level2">Level item 1.1<div class="pull-right"><i
                                                                class="ti-plus"></i></div>
                                                        <div class="clearfix"></div>
                                                    </a>
                                                    <ul id="maintenances-level2" class="collapse">
                                                        <li>
                                                            <a href="javascript:void(0);" data-toggle="collapse"
                                                                data-target="#maintenances-level3">level item 1.1.1<div
                                                                    class="pull-right"><i class="ti-plus"></i></div>
                                                                <div class="clearfix"></div>
                                                            </a>
                                                            <ul id="maintenances-level3" class="collapse">
                                                                <li> <a href="#">level item 1.1.1.1</a> </li>
                                                                <li> <a href="#">level item 1.1.1.2</a> </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li> --}}

                                            {{-- <li> <a href="#">level item 1.2</a> </li> --}}
                                        </ul>
                                    </li>
                                    @canany(['Index-R-Man.', 'View-R-Man.', 'Create-R-Man.-IT', ' Create-R-Man.-Medical'])
                                        <li>
                                            <a href="javascript:void(0);" data-toggle="collapse"
                                                data-target="#maintenances-level4">عرض طلبات الصيانة<div class="pull-right">
                                                    <i class="ti-plus"></i>
                                                </div>
                                                <div class="clearfix"></div>
                                            </a>
                                            <ul id="maintenances-level4" class="collapse">
                                                @can('Index-R-Man.')
                                                    <li> <a href="{{ route('maintenances.viewDeviceMedical') }}">عرض جميع الطلبات</a>
                                                    </li>
                                                @endcan

                                                @can('Create-R-Man.-Medical')
                                                    <li> <a href="{{ route('admin.Request_Device_Medical') }}">طلبات أجهزة طبية</a>
                                                    </li>
                                                @endcan

                                                @can('Create-R-Man.-IT')
                                                    <li> <a href="{{ route('admin.Request_Device_It') }}">طلبات أجهزة تكنولوجيا العلومات
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
                    @canany(['Create-Request'])
                        <li>
                            {{-- <a href="{{ route('maintenances.create') }}"><i class="ti-comments"></i><span --}}
                            <a href="{{ route('admin.Request_Device_Medical.create') }}"><i class="ti-comments"></i><span
                                    class="right-nav-text">أنشاء تذكرة</span></a>
                        </li>
                    @endcanany


                    {{-- <a href="{{ route('admin.adminLogin.changepassword') }}"><i class="ti-comments"></i><span
                        class="right-nav-text">أنشاء تذكرة</span></a> --}}


                    <!-- menu item chat-->

                    {{-- <li>
                        <a href="#"><i class="ti-comments"></i><span class="right-nav-text">Chat </span></a>
                    </li> --}}

                    <!-- menu item mailbox-->

                    {{-- <li>
                        <a href="#"><i class="ti-email"></i><span class="right-nav-text">Mail box</span> <span
                                class="badge badge-pill badge-warning float-right mt-1">HOT</span> </a>
                    </li> --}}

                    <!-- menu item Charts-->
                    {{-- @canany(['Index-R-Man.', 'View-R-Man.', 'Create-R-Man.-IT', ' Create-R-Man.-Medical'])
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart">
                                <div class="pull-left"><i class="ti-pie-chart"></i><span class="right-nav-text">عرض و أدارة طلبات الصيانة</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="chart" class="collapse" data-parent="#sidebarnav">

                                @can('Index-R-Man.')
                                    <li> <a href="{{ route('maintenances.viewDeviceMedical') }}">عرض جميع الطلبات</a> </li>
                                @endcan

                                @can('Create-R-Man.-Medical')
                                    <li> <a href="{{ route('ticket.device_Medical') }}">طلبات أجهزة طبية</a> </li>
                                @endcan

                                @can('Create-R-Man.-IT')
                                    <li> <a href="{{ route('ticket.devices_it') }}">طلبات أجهزة تكنولوجيا العلومات </a> </li>
                                @endcan
                            </ul>
                        </li>
                    @endcanany --}}


                    <!-- menu font icon-->

                    {{-- <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#font-icon">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">font
                                    icon</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="font-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="fontawesome-icon.html">font Awesome</a> </li>
                            <li> <a href="themify-icons.html">Themify icons</a> </li>
                            <li> <a href="weather-icon.html">Weather icons</a> </li>
                        </ul>
                    </li> --}}

                    <!-- menu title -->


                    @canany(['Index-Admin', 'Index-Roles', 'Index-Permissions'])

                        <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">أدارة المسخدمين و صلاحيات</li>
                        <!-- menu item Widgets-->
                        {{-- <li>
                            <a href="widgets.html"><i class="ti-blackboard"></i><span
                                    class="right-nav-text">Widgets</span> <span
                                    class="badge badge-pill badge-danger float-right mt-1">59</span> </a>
                        </li> --}}
                        <!-- menu item Form-->

                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Form">
                                <div class="pull-left"><i class="fa fa-users" aria-hidden="true"></i><span
                                        class="right-nav-text">صلاحيات المستخدمين</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="Form" class="collapse" data-parent="#sidebarnav">

                                @can('Index-Permissions')
                                    <li> <a href="{{ route('permissions.index') }}"><i class="fa fa-server"
                                                aria-hidden="true"></i>الصلاحيات</a> </li>
                                @endcan

                                @can('Index-Roles')
                                    <li> <a href="{{ route('roles.index') }}"><i class="fa fa-server"
                                                aria-hidden="true"></i>المسؤوليات</a> </li>
                                @endcan

                                {{-- <li> <a href="{{ route('roles.index') }}"><i class="fa fa-server" aria-hidden="true"></i>المسؤوليات</a> </li> --}}
                                <li> <a href="{{ route('users.index') }}"><i class="fa fa-user-plus"
                                            aria-hidden="true"></i>أضافة رئيس قسم</a> </li>


                                @can('Index-Admin')
                                    <li> <a href="{{ route('admin.index') }}"><i class="fa fa-user-plus"
                                                aria-hidden="true"></i>
                                            أضافة مسؤولين</a> </li>
                                @endcan

                                {{-- <li> <a href="{{ route('admin.index') }}"><i class="fa fa-user-plus" aria-hidden="true"></i> أضافة مسؤولين</a> </li> --}}
                                <li> <a href="{{ route('technicians.index') }}"><i class="fa fa-user-plus"
                                            aria-hidden="true"></i>أضافة فنيين</a> </li>
                                {{-- <li> <a href="form-input.html">Form input</a> </li>
                                <li> <a href="form-wizard.html">form wizard</a> </li>
                                <li> <a href="form-repeater.html">form repeater</a> </li>
                                <li> <a href="input-group.html">input group</a> </li>
                                <li> <a href="toastr.html">toastr</a> </li> --}}
                            </ul>
                        </li>

                    @endcanany
                    <!-- menu item table -->

                    {{-- <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#table">
                            <div class="pull-left"><i class="ti-layout-tab-window"></i><span
                                    class="right-nav-text">data table</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="table" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="data-html-table.html">Data html table</a> </li>
                            <li> <a href="data-local.html">Data local</a> </li>
                            <li> <a href="data-table.html">Data table</a> </li>
                        </ul>
                    </li> --}}

                    {{-- <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">الاستعلامات</li> --}}
                    <!-- menu item maps-->

                    {{-- <li>
                        <a href="#"><i class="ti-location-pin"></i><span class="right-nav-text">maps</span>
                            <span class="badge badge-pill badge-success float-right mt-1">06</span></a>
                    </li> --}}


                    <!-- menu item Authentication-->

                    {{-- <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#authentication">
                            <div class="pull-left"><i class="ti-id-badge"></i><span
                                    class="right-nav-text">Authentication</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="authentication" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="login.html">login</a> </li>
                            <li> <a href="register.html">register</a> </li>
                            <li> <a href="lockscreen.html">Lock screen</a> </li>
                        </ul>
                    </li> --}}

                    <!-- menu item maps-->

                    {{-- <li>
                        <a href="maps.html"><i class="ti-location-pin"></i><span class="right-nav-text">maps</span>
                            <span class="badge badge-pill badge-success float-right mt-1">06</span></a>
                    </li> --}}

                    <!-- menu item timeline-->

                    {{-- <li>
                        <a href="timeline.html"><i class="ti-panel"></i><span class="right-nav-text">timeline</span>
                        </a>
                    </li> --}}

                    <!-- menu item Multi level-->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">الشؤون المالية والادارية</li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#multi-level">
                            <div class="pull-left"><i class="ti-layers"></i><span class="right-nav-text">قسم
                                    المالية</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="multi-level" class="collapse" data-parent="#sidebarnav">
                            {{-- <li> <a href="#">أدارة طلبات الشراء</a> </li> --}}
                            <li> <a href="{{ route('purchaseOrder.index') }}">عرض طلبات الشراء</a> </li>


                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#auth">أدارة
                                    الموازنة العامة<div class="pull-right"></i></div></a>
                                <ul id="auth" class="collapse">
                                    <li>
                                        <a href="javascript:void(0);" data-toggle="collapse"
                                            data-target="#login">أدارة طلبات الشراء<div class="pull-right"><i
                                                    class="ti-plus"></i></div>
                                            <div class="clearfix"></div>
                                        </a>
                                        <ul id="login" class="collapse">
                                            <li>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#ha">أدارة بنود
                                    الموازنة<div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="ha" class="collapse">
                                    <li> <a href="#">بنود الموازنة</a> </li>
                                    <li> <a href="#">level item 2.2</a> </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    {{-- <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#multi-level">
                            <div class="pull-left"><i class="ti-layers"></i><span class="right-nav-text">Multi level
                                    Menu</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="multi-level" class="collapse" data-parent="#sidebarnav">
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#auth">Level item 1
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="auth" class="collapse">
                                    <li>
                                        <a href="javascript:void(0);" data-toggle="collapse"
                                            data-target="#login">Level item 1.1<div class="pull-right"><i
                                                    class="ti-plus"></i></div>
                                            <div class="clearfix"></div>
                                        </a>
                                        <ul id="login" class="collapse">
                                            <li>
                                                <a href="javascript:void(0);" data-toggle="collapse"
                                                    data-target="#invoice">level item 1.1.1<div class="pull-right"><i
                                                            class="ti-plus"></i></div>
                                                    <div class="clearfix"></div>
                                                </a>
                                                <ul id="invoice" class="collapse">
                                                    <li> <a href="#">level item 1.1.1.1</a> </li>
                                                    <li> <a href="#">level item 1.1.1.2</a> </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li> <a href="#">level item 1.2</a> </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#error">level item
                                    2<div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="error" class="collapse">
                                    <li> <a href="#">level item 2.1</a> </li>
                                    <li> <a href="#">level item 2.2</a> </li>
                                </ul>
                            </li>
                        </ul>
                    </li> --}}


                    {{-- <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#maintenances-level">
                            <div class="pull-left"><i class="ti-layers"></i><span class="right-nav-text">أدارة
                                    الأجهزة وطلبات الصيانة</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="maintenances-level" class="collapse" data-parent="#sidebarnav">
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse"
                                    data-target="#maintenances-level1">عرض أدارة الأجهزة<div class="pull-right"><i
                                            class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="maintenances-level1" class="collapse">
                                    <li> <a href="#">عرض الأجهزة </a> </li>
                                    <li>
                                        <a href="javascript:void(0);" data-toggle="collapse"
                                            data-target="#maintenances-level2">Level item 1.1<div class="pull-right">
                                                <i class="ti-plus"></i></div>
                                            <div class="clearfix"></div>
                                        </a>
                                        <ul id="maintenances-level2" class="collapse">
                                            <li>
                                                <a href="javascript:void(0);" data-toggle="collapse"
                                                    data-target="#maintenances-level3">level item 1.1.1<div
                                                        class="pull-right"><i class="ti-plus"></i></div>
                                                    <div class="clearfix"></div>
                                                </a>
                                                <ul id="maintenances-level3" class="collapse">
                                                    <li> <a href="#">level item 1.1.1.1</a> </li>
                                                    <li> <a href="#">level item 1.1.1.2</a> </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li> <a href="#">level item 1.2</a> </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse"
                                    data-target="#maintenances-level4">عرض وأدارة طلبات الصيانة<div
                                        class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="maintenances-level4" class="collapse">
                                    <li> <a href="#">عرض جميع الطلبات</a> </li>
                                    <li> <a href="#">level item 2.2</a> </li>
                                </ul>
                            </li>
                        </ul>
                    </li> --}}

                    <!-- menu item timeline-->
                    @canany(['View-departments', 'View-Subdepartments', 'Edit-departments', 'Delete-departments',
                        'Show-departments'])
                        <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">أعدادات النظام</li>
                        <!-- menu item Custom pages-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#custom-page">
                                <div class="pull-left"><i class="fa fa-cog" aria-hidden="true"></i><span
                                        class="right-nav-text">الأعدادات</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            {{-- @canany(['Edit-departments', 'Delete-departments', 'Show-departments']) --}}

                            <ul id="custom-page" class="collapse" data-parent="#sidebarnav">

                                @can('View-departments')
                                    <li> <a href="{{ route('departments.index') }}"><i class="fa fa-plus"
                                                aria-hidden="true"></i>أضافة قسم</a> </li>
                                @endcan

                                @can('View-Subdepartments')
                                    <li> <a href="{{ route('subdepartments.index') }}"><i class="fa fa-plus"
                                                aria-hidden="true"></i>أضافة وحدة</a> </li>
                                @endcan
                                {{-- <li> <a href="profile.html"></a> </li>
                                <li> <a href="app-contacts.html">App contacts</a> </li>
                                <li> <a href="contacts.html">Contacts</a> </li>
                                <li> <a href="file-manager.html">file manager</a> </li>
                                <li> <a href="invoice.html">Invoice</a> </li>
                                <li> <a href="blank.html">Blank page</a> </li>
                                <li> <a href="layout-container.html">layout container</a> </li>
                                <li> <a href="error.html">Error</a> </li>
                                <li> <a href="faqs.html">faqs</a> </li> --}}
                            </ul>
                            {{-- @endcanany --}}

                        </li>
                    @endcanany

                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
  
