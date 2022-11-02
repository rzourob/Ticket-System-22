<!--=================================
 Main content -->

 <div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">

            @if(auth('web')->check())
            @include('layouts.main-header.user-main-header');
             @endif

            @if(auth('admin')->check())
             @include('layouts.main-header.admin-main-header');
            @endif

            @if(auth('technician')->check())

            @endif
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
  
