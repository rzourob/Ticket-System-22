@extends('layouts.master')
@section('css')

@section('title')
    أسم المسؤولية
@stop
@endsection
@section('PageTitle')

<!-- breadcrumb -->
@section('PageTitle2')
أسم المسؤولية

@stop
<!-- breadcrumb -->
@endsection
@section('content')
<div class="row">
    <div class="col-md-2">
        <tbody>
            <tr>
                <td>
                    <a href="{{ route('roles.create') }}" class="btn btn-block btn-outline-success btn-lg"> اضافة مسؤولية</a>
                </td>
            </tr>
        </tbody>
    </div>
</div>
<br>
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
                            <th>اسم المسؤولية</th>
                            {{-- <th>Guard Name</th> --}}
                            <th>الصلاحيات</th> 
                            <th>تاريخ الانشاء</th>
                            {{-- <th>{{trans('role_trans.update_at')}}</th> --}}
                            <th>الاجراءات</th>
                          </tr>
                      </thead>
                      <tbody>
                      @foreach ($roles as $role)
                      <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    {{-- <td>{{ $role->guard_name }}</td> --}}
                    <td><a href="{{route('roles.show',$role->id)}}"
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
                                <a class="dropdown-item" href="#" onclick="performDestroy{{ $role->id }},this)  " class="btn btn-danger">حذف قسم</a>
                            </div>
                        </div>

                    </td>
                      </tr> 
                    @endforeach
                      <tfoot>
                          <tr>
                            <th>ID</th>
                            <th>اسم المسؤولية</th>
                            {{-- <th>Guard Name</th> --}}
                            <th>الصلاحيات</th> 
                            <th>تاريخ الانشاء</th>
                            {{-- <th>{{trans('role_trans.update_at')}}</th> --}}
                            <th>الاجراءات</th>
                          </tr>
                      </tfoot>
                      
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

           function performDestroy(id,ref){
                confirmDestroy('/admin/roles/'+id,ref);    
            }    
    
         
            
    
    </script>
@endsection
