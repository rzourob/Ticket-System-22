{{-- @extends('layouts.master')
@section('Blank Page','Permissions')

@section('titel pag','Permissions')

@section('titel smal','View Permissions')

@section('content')

<section class="content">

 <!-- /.row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">View Permissions</h3>
    
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
                                <th>Create At</th>
                                <th>Update At</th>
                                <th>Settings</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            
                                @foreach ($permissions as $permission)
                                  <tr>
                                <td>{{ $permission->id }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->guard_name }}</td>                               
                                <td>{{ $permission->created_at }}</td>
                                <td>{{ $permission->updated_at }}</td>
                                
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('permissions.edit',$permission->id) }}" class="btn btn-info">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        
                                         <a href="#" onclick="performDestroy({{ $permission->id }},this)  " class="btn btn-danger">
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
            confirmDestroy('/cms/admin/permissions/'+id,ref);    
        } 

</script>

    @endsection --}}





    @extends('layouts.master')
@section('css')

@section('title')
    {{trans('permissions_trans.title_page')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{trans('permissions_trans.title_page')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
            {{-- <h3 class="card-title">View Permissions</h3> --}}
            <div class="col-md-3">

        <div class="container-fluid">
            <tbody>
                <tr>
                    <td>
                            <a href="{{ route('permissions.create') }}" class="btn btn-block btn-outline-success btn-lg  " >{{trans('permissions_trans.add_permissions')}}</a>
                    </td>
                </tr>
            </tbody>
        </div>

    </div>

     <br>                <!-- /.card-header -->
                <div class="card-body table-responsive p-1">
                    <table  id="example1" class="table table-bordered table table-striped " style="text-align: center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>{{trans('permissions_trans.name')}}</th>
                                <th>{{trans('permissions_trans.guard_name')}}</th>
                                <th>{{trans('permissions_trans.date_created')}}</th>
                                {{-- <th>{{trans('permissions_trans.add_city')}}</th> --}}
                                <th>{{trans('permissions_trans.action')}}</th>                                
                            </tr>
                        </thead>
                        <tbody>                            
                                @foreach ($permissions as $permission)
                                  <tr>
                                <td>{{ $permission->id }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->guard_name }}</td>                               
                                <td>{{ $permission->created_at }}</td>
                                {{-- <td>{{ $permission->updated_at }}</td>                                 --}}
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('permissions.edit',$permission->id) }}" class="btn btn-info">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        
                                         <a href="#" onclick="performDestroy({{ $permission->id }},this)  " class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
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
           confirmDestroy('/hamad/SS/permissions/'+id,ref);    

        }
</script>
@endsection
