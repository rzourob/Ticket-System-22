

@extends('layouts.master')
@section('css')

@section('title')
    صلاحيات المسؤولية
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle2')
صلاحيات المسؤولية
<!-- breadcrumb -->
@section('PageTitle')
صلاحيات المسؤولية
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
  <div class="col-md-12 mb-30">
      <div class="card card-statistics h-100">
          <div class="card-body">
              <div class="table-responsive">
                  <table id="datatable" class="table table-striped table-bordered p-0">
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
                        <td><span class="btn btn-info">{{$permission->guard_name}}</span></td>
                        <td>
                          {{-- <div class="icheck-primary d-inline">
                            <input type="checkbox" id="permission_{{$permission->id}}"
                              onchange="storeRolePermission({{$role->id}},{{$permission->id}})" @if($permission->active) checked
                            @endif>
                            <label for="permission_{{$permission->id}}">
                            </label>
                          </div> --}}

                          <div class="checkbox checbox-switch switch-success">
                            <label for="permission_{{$permission->id}}">
                                <input type="checkbox" id="permission_{{$permission->id}}" onchange="storeRolePermission({{$role->id}},{{$permission->id}})" @if($permission->active) checked
                                @endif>
                                <span></span>
                            </label>
                        </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                    
                 </table>
                </div>
          </div>
      </div>
  </div>
</div>
<!-- row closed -->
@endsection
@section('js')
<script>

  
         function storeRolePermission(roleId, permissionId){
      let data = {
        permission_id: permissionId,
      };
      
      store('/admin/role/'+roleId+'/permissions',data);
    }
       
          
  
  </script>
@endsection
