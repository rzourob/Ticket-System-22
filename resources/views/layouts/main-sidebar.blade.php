<!--=================================
 Main content -->

<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">

            @if(auth('web')->check())
            @include('layouts.main-sidebar.user-main-sidebar');
             @endif

            @if(auth('admin')->check())
             @include('layouts.main-sidebar.admin-main-sidebar');
            @endif

            @if(auth('technician')->check())
            @include('layouts.main-sidebar.technician-main-sidebar');
            @endif
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
  
