@extends('layouts.master')
@section('css')

@section('title')
    عرض المستخدمين
@stop
@endsection
<!-- breadcrumb -->
@section('PageTitle')
<!-- breadcrumb -->

@section('PageTitle2')
عرض المستخدمين  
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
{{-- <div class="row">
    <div class="col-md-2">
                <tbody>
                    <tr>
                        <td>
                         <a href="{{ route('users.create') }}" class="btn btn-block btn-outline-success btn-lg  " >أضافة مستخدم</a>
                         </td>
                    </tr>
                </tbody>

    </div>
     </div>
<br> --}}

{{-- <div class="row">
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
                          @foreach ($users as $user)
                            <?php $i++ ; ?>
                            <tr>
                                <td>{{ $i }}</td>
                          
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td>{{ $user->role->name }}</td>
                          <td>
                                  @if ($user->status == 'مفعل')
                                      <span class="badge ">
                                          <div class="dot-label bg-success ml-1"></div>{{ $user->status }}
                                      </span>
                                  @else
                                      <span class="badge ">
                                          <div class="dot-label bg-danger ml-1"></div>{{ $user->status }}
                                      </span>
                                  @endif
                              </td>

                          <td>{{ $user->created_at }}</td>
                          <td>{{ $user->updated_at }}</td>
                          <td>
                              <div class="btn-group">
                                  <a href="{{ route('users.edit',$user->id) }}" class="btn btn-info">
                                      <i class="fa fa-edit"></i>
                                  </a>

                                  <a href="#" onclick="performDestroy({{ $user->id }},this)  " class="btn btn-danger">
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
</div> --}}
<div class="col-xl-12 mb-30">     
    <div class="card card-statistics h-100"> 
      <div class="card-body">   
        <div class="tab round shadow">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link active show" id="home-08-tab" data-toggle="tab" href="#home-08" role="tab" aria-controls="home-08" aria-selected="true"> <i class="fa fa-home"></i>حسابات مسؤول النظام</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-08-tab" data-toggle="tab" href="#profile-08" role="tab" aria-controls="profile-08" aria-selected="false"><i class="fa fa-user"></i> حسابلت الفنيين </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="portfolio-08-tab" data-toggle="tab" href="#portfolio-08" role="tab" aria-controls="portfolio-08" aria-selected="false"><i class="fa fa-picture-o"></i> حسابات الاقصام </a>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link" id="contact-08-tab" data-toggle="tab" href="#contact-08" role="tab" aria-controls="contact-08" aria-selected="false"><i class="fa fa-check-square-o"></i> Contact </a>
            </li> --}}
            <h5 class="card-title"> </h5>
          </ul>


          <div class="tab-content">
            <div class="tab-pane fade active show" id="home-08" role="tabpanel" aria-labelledby="home-08-tab">
                <div class="card-body">
                @include('admin.index');
            </div>
            </div>
            <div class="tab-pane fade" id="profile-08" role="tabpanel" aria-labelledby="profile-08-tab">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                                    <tbody>
                                        <tr>
                                            <td>
                                             <a href="#" class="tab round shadow btn-outline-success btn-lg  " >أضافة فني</a>
                                             </td>
                                        </tr>
                                    </tbody>
                    
                        </div>
                         </div>
                    <br>
                    <div class="table-responsive">
                        <table id="datatable2" class="table table-striped table-bordered p-0">
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
                                   

                            </tbody>
                       </table>
                    </div>
                </div>            
            </div>
            <div class="tab-pane fade" id="portfolio-08" role="tabpanel" aria-labelledby="portfolio-08-tab">
                <div class="card-body">
                    @include('users.index');
                </div>           
            </div>
            <div class="tab-pane fade" id="contact-08" role="tabpanel" aria-labelledby="contact-08-tab">
              <p>The other virtues practice in succession by Franklin were silence, order, resolution, frugality, industry, sincerity, Justice, moderation, cleanliness, tranquility, chastity and humility. For the summary order he followed a little scheme of employing his time each day. From five to seven each morning he spent in bodily personal attention, saying a short prayer, thinking over the day’s business and resolutions.</p>
            </div>
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



