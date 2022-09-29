{{-- @extends('layouts.master')

@section('Blank Page','Roles')

@section('titel pag','Roles')

@section('titel smal','View Roles')

@section('content')

<section class="content">

 <!-- /.row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">View Roles</h3>
    
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
    
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-bordered table table-striped ">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Guard name</th>
                                <th>Permissions</th> 
                                <th>Create At</th>
                                <th>Update At</th>
                                <th>Settings</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            
                                @foreach ($roles as $role)
                                  <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->guard_name }}</td>
                                <td><a href="{{route('role.permissions.index',$role->id)}}"
                                    class="btn btn-info">{{$role->permissions_count}}Permission/s</a></td>                                 
                                <td>{{ $role->created_at }}</td>
                                <td>{{ $role->updated_at }}</td>
                                
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('roles.edit',$role->id) }}" class="btn btn-info">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        
                                         <a href="#" onclick="performDestroy({{ $role->id }},this)  " class="btn btn-danger">
                                            <i class="fas fa-trash-alt"></i>
                                         </a>
                                       
                                    </div>
                                </td>




                                  </tr> 
                                @endforeach
                            
                        
                         
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.row -->

</section>

@endsection


@section('script')

<script>
        function performDestroy(id,ref){
            confirmDestroy('/cms/admin/roles/'+id,ref);    
        } 

</script>

    @endsection --}}



    @extends('layouts.master')
@section('css')

@section('title')
    {{trans('role_trans.view_role')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{trans('role_trans.view_role')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
            {{-- <h3 class="card-title">View Roles</h3> --}}
            
    <div class="col-md-3">

        <div class="container-fluid">

            <tbody>

                <tr>

                    <td>
                            <a href="{{ route('roles.create') }}" class="btn btn-block btn-outline-success btn-lg">{{trans('role_trans.add_role')}}</a>
                    </td>


                </tr>
            </tbody>
        </div>

    </div>

<br>

<!-- /.card-header -->
                <div class="card-body table-responsive p-1">
                    <table  id="example1" class="table table-bordered table table-striped " style="text-align: center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>أسم المستخدم</th>
                                <th>صلاحيات المستخدم</th>
                                <th>تاريخ الاضافة</th>
                                {{-- <th>{{trans('role_trans.update_at')}}</th> --}}
                                <th>الاعدادات</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            
                                @foreach ($roles as $role)
                                  <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->guard_name }}</td>
                                <td><a href="{{route('role.permissions.index',$role->id)}}"
                                    class="btn btn-info">{{$role->permissions_count}}Permission/s</a></td>                                 
                                <td>{{ $role->created_at }}</td>
                                {{-- <td>{{ $role->updated_at }}</td> --}}
                                
                                {{-- <td>
                                    <div class="btn-group">
                                        <a href="{{ route('roles.edit',$role->id) }}" class="btn btn-info">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        
                                         <a href="#" onclick="performDestroy({{ $role->id }},this)  " class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                         </a>
                                       
                                    </div>
                                </td> --}}

                                <td>

                                    <div class="btn-group mb-1 ">
                                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" _msthash="3150394" _msttexthash="95992" style="direction: ltr;">الأجراءات</button>
                                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 33px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <a class="dropdown-item" href="{{ route('roles.edit',$role->id) }}">تعديل بيانات</a>
                                            <a class="dropdown-item" href="#" onclick="performDestroy({{ $role->id }},this)  " class="btn btn-danger">حذف قسم</a>
                                        </div>
                                    </div>
        
                                </td>




                                  </tr> 
                                @endforeach
                            
                        
                         
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

<script>

$(function () {
   $("#example1").DataTable({
    "responsive": true, "lengthChange": false, "autoWidth": false,
    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    
  });

       function performDestroy(id,ref){
            confirmDestroy('/ar/user_role/'+id,ref);    


            store('/hamad/SS/role/'+roleId+'/permissions',data);
        }    

     
        

</script>

    @endsection

