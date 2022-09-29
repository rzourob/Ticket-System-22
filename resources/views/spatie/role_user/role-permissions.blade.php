{{-- @extends('layouts.master')

@section('style')
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
@endsection

@section('title','Role Permissions')
@section('page-title','Role Permissions')
@section('small-title','Role Permissions')

@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Role Permissions</h3>

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
            <table class="table table-hover table-bordered table-striped text-nowrap">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Guard</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($permissions as $permission)
                <tr>

                  <td>{{$permission->id}}</td>
                  <td>{{$permission->name}}</td>
                  <td><span class="badge bg-success">{{$permission->guard_name}}</span></td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="checkbox" id="permission_{{$permission->id}}"
                        onchange="storeRolePermission({{$roleId}},{{$permission->id}})" @if($permission->active) checked
                      @endif>
                      <label for="permission_{{$permission->id}}">
                      </label>
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
  </div>
</section>
@endsection

@section('js')

<script>
  function storeRolePermission(roleId, permissionId){
    let data = {
      permission_id: permissionId,
    };
    
    store('/ar/role/'+roleId+'/permissions',data);
  }
</script>
@endsection --}}



@extends('layouts.master')
@section('css')

@section('title')
    empty
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    empty
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
           
            <h3 class="card-title"> الصلاحيات</h3>

            
          
            <div class="card-body table-responsive p-1">
                    <table  id="example1" class="table table-bordered table table-striped " style="text-align: center">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Guard</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($permissions as $permission)
                <tr>

                  <td>{{$permission->id}}</td>
                  <td>{{$permission->name}}</td>
                  <td><span class="badge bg-success">{{$permission->guard_name}}</span></td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="checkbox" id="permission_{{$permission->id}}"
                        onchange="storeRolePermission({{$roleId}},{{$permission->id}})" @if($permission->active) checked
                      @endif>
                      <label for="permission_{{$permission->id}}">
                      </label>
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

       function storeRolePermission(roleId, permissionId){
    let data = {
      permission_id: permissionId,
    };
    
    store('/admin/role/'+roleId+'/permissions',data);
  }
     
        

</script>
@endsection
