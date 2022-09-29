@extends('layouts.master')
@section('css')

@section('title')
    عرض الفنيين
@stop
@endsection
<!-- breadcrumb -->
@section('PageTitle')
<!-- breadcrumb -->

@section('PageTitle2')
عرض الفنيين
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
                         <a href="{{ route('technicians.create') }}" class="btn btn-block btn-outline-success btn-lg  " >أضافة مستخدم</a>
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
                            {{-- <th>نوع المستخدم </th> --}}
                            <th>حاله المستخدم</th>
                            <th>تاريخ أضافة </th>
                            <th>تاريخ أخر تحديث </th>
                            <th>الاعدادات</th>
                          </tr>
                      </thead>
                      <tbody>
                           
                        <?php $i= 0 ; ?>
                          @foreach ($technicians as $technician)
                            <?php $i++ ; ?>
                            <tr>
                                <td>{{ $i }}</td>
                          
                          <td>{{ $technician->name }}</td>
                          <td>{{ $technician->email }}</td>
                          {{-- <td>{{ $technician->role->name }}</td> --}}
                          <td>
                                  @if ($technician->status == 'مفعل')
                                      <span class="badge ">
                                          <div class="dot-label bg-success ml-1"></div>{{ $technician->status }}
                                      </span>
                                  @else
                                      <span class="badge ">
                                          <div class="dot-label bg-danger ml-1"></div>{{ $technician->status }}
                                      </span>
                                  @endif
                              </td>

                          <td>{{ $technician->created_at }}</td>
                          <td>{{ $technician->updated_at }}</td>
                          <td>
                              <div class="btn-group">
                                  <a href="{{ route('technicians.edit',$technician->id) }}" class="btn btn-info">
                                      <i class="fa fa-edit"></i>
                                  </a>

                                  <a href="#" onclick="performDestroy({{ $technician->id }},this)  " class="btn btn-danger">
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
               confirmDestroy('/admin/technicians/'+id,ref);    
    
            }
            
    
    </script>
@endsection



