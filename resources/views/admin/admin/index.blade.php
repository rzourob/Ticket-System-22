@extends('layouts.master')
@section('css')

@section('title')
    عرض مسؤولين النظام
@stop
@endsection
<!-- breadcrumb -->
@section('PageTitle')
<!-- breadcrumb -->

@section('PageTitle2')
عرض مسؤولين النظام  
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-2">
                <tbody>
                    <tr>
                        <td>
                         <a href="{{ route('admin.create') }}" class="btn btn-block btn-outline-success btn-lg  " >أضافة مستخدم</a>
                         </td>
                    </tr>
                </tbody>

    </div>
     </div>
<br>

<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                      <thead>
                          <tr>
                            <th>No.</th>
                            <th>الاسم المسخدم</th>
                            <th>البريد الاكتروني</th>
                            <th>نوع المستخدم </th>
                            <th>حاله المستخدم</th>
                            <th>تاريخ أضافة </th>
                            <th>تاريخ أخر تحديث </th>
                            <th>الاعدادات</th>
                          </tr>
                      </thead>
                      <tbody>
                           
                        <?php $i= 0 ; ?>
                          @foreach ($admins as $admin)
                            <?php $i++ ; ?>
                            <tr>
                                <td>{{ $i }}</td>
                          
                          <td>{{ $admin->name }}</td>
                          <td>{{ $admin->email }}</td>
                          <td>{{ $admin->roles[0]->name }}</td>
                          <td>
                                  @if ($admin->status == 'مفعل')
                                      <span class="badge ">
                                          <div class="dot-label bg-success ml-1"></div>{{ $admin->status }}
                                      </span>
                                  @else
                                      <span class="badge ">
                                          <div class="dot-label bg-danger ml-1"></div>{{ $admin->status }}
                                      </span>
                                  @endif
                              </td>

                          <td>{{ $admin->created_at }}</td>
                          <td>{{ $admin->updated_at }}</td>
                          <td>
                              <div class="btn-group">
                                  <a href="{{ route('admin.edit',$admin->id) }}" class="btn btn-info">
                                      <i class="fa fa-edit"></i>
                                  </a>

                                  <a href="#" onclick="performDestroy({{ $admin->id }},this)  " class="btn btn-danger">
                                      <i class="fa fa-trash"></i>
                                  </a>
                                  </a>            
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
           function performDestroy(id,ref){
               confirmDestroy('/admin/users/'+id,ref);    
    
            }
            
    
    </script>
@endsection



