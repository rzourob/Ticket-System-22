{{-- 
@extends('professions_system.parant')
@section('style')
<link rel="stylesheet" href="{{asset('prof/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('prof/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection

@section('Blank Page','Cities')

@section('titel pag','Cities')

@section('titel smal','Edite Cities')

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edite cities</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="create_form">
                        @csrf
                        <div class="card-body">
                             
                            <div class="form-group">
                                <label for="title_en">Title En</label>
                                <input type="text" name="title_en" class="form-control" id="title_en"
                                    placeholder="Enter Title En" value="{{$citie->title_en}}">
                            </div>
                            <div class="form-group">
                                <label for="title_ar">Title Ar</label>
                                <input type="text" name="title_ar" class="form-control" id="title_ar"
                                    placeholder="Title Ar" value="{{$citie->title_ar}}">
                            </div>

                            <div class="form-check">
                                <input type="checkbox" name="active" class="form-check-input" id="active">
                                <label class="form-check-label" for="active">Active</label>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="button" onclick="performUpdate({{$citie->id}})" class="btn btn-primary">Store</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
        
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

@endsection


@section('script')
<script src="{{asset('prof/plugins/select2/js/select2.full.min.js')}}"></script>
<script>

    function performUpdate(id){
        let data = {
            title_en: document.getElementById('title_en').value,
            title_ar: document.getElementById('title_ar').value,
            active: document.getElementById('active').checked,
            
        };

        let redirectUrl = '/cms/admin/cities'
        update('/cms/admin/cities/'+id,data,redirectUrl);
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
                   <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    أضافة مستخدم جديد
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <br>

                   <form id="create_form">
                        @csrf
                        <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="col">
                                        <label for="name" class="mr-sm-2">أسم المستخدم</label>
                                        <input type="text" name="name" class="form-control" id="name" value="{{$user->name}}"
                                        placeholder="يرجى أدخال اسم المستخدم">
                                    </div>
                                </div> 

                                <div class="col-md-6">
                                    <div class="col">
                                         <label for="email" class="mr-sm-2">البريد الاكتروني</label>
                                         <input type="email" name="email" class="form-control" id="email" value="{{$user->email}}"
                                           placeholder="يرجي أدخال كلمة المرور">
                                    </div>
                                </div> 
                    
                        </div>
<br>
                        <div class="row">
                                <div class="col-md-6">
                                    <div class="col">
                                         <label for="password" class="mr-sm-2">الرقم السري</label>
                                         <input type="password" name="password" class="form-control" id="password" autocomplete="new-password" value="{{$user->password}}"
                                           placeholder="يرجي ادخال الرقم السري">
                                    </div>
                                </div> 

                                

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">حالة المستخدم</label>
                                            <select class="form-control status" id="status" style="width: 100%;">
                                               <option value="">أختار حالة المستخدم</option>
                                                     <option value="مفعل" {{ $user->status == "مفعل"  ? 'selected' : ''}}>مفعل</option>
                                                     <option value="غير مفعل" {{ $user->status == "غير مفعل"  ? 'selected' : ''}}>غير مفعل</option>
                                            </select>
                                    </div>
                                </div>

                                

                                
                        </div>

                        <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">نوع المستخدم</label>
                                            <select class="form-control roles" multiple="multiple" id="roles" id="roles" style="width: 100%;" multiple="">
                                               <option value="">أختار نوع المستخدم</option>
                                               @foreach ($roles as $role)
                                                     {{-- <option value="{{$role->id}}" {{ $role->id == $user->role->id ? 'selected' : '' }}>{{$role->name}}</option> --}}
                                                @endforeach
                                            </select>
                                    </div>
                                </div>
                        
                        <br>
         {{-- <div class="row mg-b-20">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>نوع المستخدم</strong>
                            {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple'))
                            !!}
                        </div>
                    </div>
                </div> --}}



                            {{-- <div class="form-check">
                                <input type="checkbox" name="active"class="form-check-input" id="active">
                                <label class="form-check-label" for="active">{{trans('cities_trans.active')}}</label>
                            </div> --}}
                        </div>
                        <!-- /.card-body -->

                            <div class="modal-footer">
                                <button type="button" onclick="performUpdate({{$user->id}})" class="btn btn-primary">أنشاء مستخدم</button>
                            </div>
                    </form> 
                      
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
<script src="{{asset('admin/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script>

$('.select2bs4').select2({
      theme: 'bootstrap4'
    });

    $('.roles').select2({
      theme: 'bootstrap4'
    });

    $('.status').select2({
        theme: 'bootstrap4'
    });

$(function () {
   $("#example1").DataTable({
    "responsive": true, "lengthChange": false, "autoWidth": false,
    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    
  });

        function performUpdate(id){
        let data = {
            name: document.getElementById('name').value,
            email: document.getElementById('email').value,
            password: document.getElementById('password').value,
            //role_id: document.getElementById('roles').value,
            status: document.getElementById('status').value,
        };

        //store('/ar/users',data);

        let redirectUrl ='/hamad/SS/users'
        update('/hamad/SS/users'+id,data);
    }
        

</script>
@endsection