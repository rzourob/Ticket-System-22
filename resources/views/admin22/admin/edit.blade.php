@extends('layouts.master')
@section('css')

<link rel="stylesheet" href="{{asset('assets/js/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/js/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<!---Internal Fileupload css-->
<link href="{{ URL::asset('assets/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
<!---Internal Fancy uploader css-->
<link href="{{ URL::asset('assets/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />

@section('title')
    تعديل بيانات المستخدم
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle2')
    تعديل بيانات 
<!-- breadcrumb -->
@section('PageTitle')
تعديل بيانات المستخدم
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                 <!-- form start -->
                 <form id="create_form">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name" class="mr-sm-2"><h5>أسم المستخدم</h5></label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="name"  id="name" placeholder="يرجى أدخال اسم المستخدم" aria-label="Recipient's username" 
                                aria-describedby="basic-addon2" value="{{$admin->name}}">
                                <div class="input-group-append">
                                  <span class="input-group-text" id="basic-addon2">الاسم ثلاثي</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="email" class="mr-sm-2"><h5>البريد الاكتروني</h5></label>
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" name="email" id="email" placeholder="يرجي أدخال البريد الاكتروني" aria-label="Recipient's username"
                                 aria-describedby="basic-addon2" value="{{$admin->email}}">
                                <div class="input-group-append">
                                  <span class="input-group-text" id="basic-addon2">@example.com</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="password" class="mr-sm-2"><h5>كلمة المرور</h5></label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" name="password"  id="password" placeholder="يرجى أدخال كلمة المرور" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                  <span class="input-group-text" id="basic-addon2">كلمة المرور</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="password_confirmation" class="mr-sm-2" ><h5>تاكيد كلمة المرور</h5></label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="password_confirmation"  id="password_confirmation" placeholder="يرجى أدخال اسم المستخدم" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                  <span class="input-group-text" id="basic-addon2">تأكيد كلمة المرور</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col">
                                <label for="roles" class="mr-sm-2" ><h5>نوع المستخدم</h5></label>
                                <select class="form-control roles" multiple="multiple" id="roles" style="width: 100%;" multiple="">
                                    <option value="">أختار نوع المستخدم</option>
                                    @foreach ($roles as $role)
                                    <option value="{{$role->id}}" @selected($currentRole->id == $role->id)>{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col">
                                <label class="mr-sm-2"><h5>حالة المستخدم</h5></label>
                                <select class="custom-select" id="status">
                                    <option value="">أختار حالة المستخدم</option>
                                    <option value="مفعل" {{ $admin->status == 'مفعل'  ? 'selected' : ''}}>مفعل</option>
                                    <option value="غير مفعل" {{ $admin->status == 'غير مفعل'  ? 'selected' : ''}}>غير مفعل</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col">
                                <label for="roles" class="mr-sm-2" ><h5>صورة شخصية</h5></label>
                                <p class="text-danger">* صيغة المرفق jpeg ,.jpg , png </p>
                                <input type="file" name="image" id="image" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png" data-height="70" />
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="modal-footer">
                        <button type="button" onclick="performUpdate()" class="btn btn-primary">تعديل البيانات</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
<link rel="stylesheet" href="{{asset('assets/js/select2/css/select2.min.css')}}">
<script src="{{asset('assets/js/select2/js/select2.full.min.js')}}"></script>

<!--Internal Fileuploads js-->
<script src="{{ URL::asset('assets/fileuploads/js/fileupload.js') }}"></script>
<script src="{{ URL::asset('assets/fileuploads/js/file-upload.js') }}"></script>

<script>
    
        $('.roles').select2({
          theme: 'bootstrap4'
        });
    
        $('.status').select2({
          theme: 'bootstrap4'
        });
        
            function performUpdate(){    
        let formData = new FormData();
        formData.append('_method','PUT');
            
            formData.append('name',document.getElementById('name').value);
            formData.append('email',document.getElementById('email').value);
            formData.append('password',document.getElementById('password').value);
            formData.append('roles',document.getElementById('roles').value);
            formData.append('status',document.getElementById('status').value);
            formData.append('image',document.getElementById('image').files[0]);
    
           store('/admin/admin/{{$admin->id}}',formData);
        }
    
    </script>
@endsection
