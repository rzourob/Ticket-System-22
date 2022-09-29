@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="{{asset('assets/js/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/js/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

<!---Internal Fileupload css-->
<link href="{{ URL::asset('assets/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
<!---Internal Fancy uploader css-->
<link href="{{ URL::asset('assets/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />

@section('title')
    أنشاء مستخدم
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle2')
أنشاء مستخدم
<!-- breadcrumb -->
@section('PageTitle')
أنشاء مستخدم جديد
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
                            <label for="name"  class="mr-sm-2"><h5 >أسم المستخدم</h5></label>
                            {{-- <div class="col">
                                <label for="name" class="mr-sm-2">أسم المستخدم</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="يرجى أدخال اسم المستخدم">
                            </div> --}}

                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="name"  id="name" placeholder="يرجى أدخال اسم المستخدم" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                  <span class="input-group-text" id="basic-addon2">الاسم ثلاثي</span>
                                </div>
                              </div>
                        </div>

                        <div class="col-md-6">
                            <label for="email" class="mr-sm-2"><h5>البريد الاكتروني</h5></label>

                            {{-- <div class="col">
                                <label for="email" class="mr-sm-2">البريد الاكتروني</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="يرجي أدخال كلمة المرور">
                            </div> --}}
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" name="email" id="email" placeholder="يرجي أدخال البريد الاكتروني" aria-label="Recipient's username" aria-describedby="basic-addon2">
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
                            {{-- <div class="col">
                                <label for="password" class="mr-sm-2">كلمة المرور</label>
                                <input type="password" name="password" class="form-control" id="password" data-parsley-class-handler="#password" placeholder="يرجي ادخال الرقم السري">
                            </div> --}}

                            <div class="input-group mb-3">
                                <input type="password" class="form-control" name="password"  id="password" placeholder="يرجى أدخال كلمة المرور" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                  <span class="input-group-text" id="basic-addon2">كلمة المرور</span>
                                </div>
                              </div>
                        </div>


                        <div class="col-md-6">
                            <label for="password_confirmation" class="mr-sm-2" ><h5>تاكيد كلمة المرور</h5></label>
                            {{-- <div class="col">
                                <label for="password_confirmation" class="mr-sm-2" >تاكيد كلمة المرور</label>
                                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" data-parsley-class-handler="#password" placeholder=" تاكيد كلمة المرور الجديدة">
                            </div> --}}

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
                                {{-- <select class="form-control roles" multiple="multiple" name="roles" id="roles" style="width: 100%;" multiple="">
                                    <option value="">أختار نوع المستخدم</option>
                                    @foreach ($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select> --}}
                                <select class="custom-select" id="roles">
                                    <option value="">أختار نوع المستخدم</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="col">
                                <label class="mr-sm-2"><h5>حالة المستخدم</h5></label>
                                {{-- <select class="form-control" id="status" style="width: 100%;">
                                    <option value="">أختار حالة المستخدم</option>
                                    <option value="مفعل">مفعل</option>
                                    <option value="غير مفعل">غير مفعل</option>
                                </select> --}}

                                <select class="custom-select" id="status">
                                    <option value="">أختار حالة المستخدم</option>
                                    <option value="مفعل">مفعل</option>
                                    <option value="غير مفعل">غير مفعل</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col">
                                <label for="roles" class="mr-sm-2" ><h5>صورة شخصية</h5></label>

                                {{-- <table class="card-title ">
                                    <h5 class=" card-header  mb-0 my-auto"> صورة شخصية :</h5>
                                </table> --}}
                                <p class="text-danger">* صيغة المرفق jpeg ,.jpg , png </p>
                                <input type="file" name="image" id="image" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png" data-height="70" />
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="modal-footer">
                        <button type="button" onclick="performStore()" class="btn btn-primary">أنشاء مستخدم</button>
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
    // $('.select2').select2({
    //       theme: 'bootstrap4'
    //     });

    $('.roles').select2({
        theme: 'bootstrap4'
    });

    $('.status').select2({
        theme: 'bootstrap4'
    });


    function performStore() {
        let formData = new FormData();
        formData.append('name', document.getElementById('name').value);
        formData.append('email', document.getElementById('email').value);
        formData.append('password', document.getElementById('password').value);
        formData.append('password_confirmation', document.getElementById('password_confirmation').value);
        formData.append('role_id', document.getElementById('roles').value);
        formData.append('status', document.getElementById('status').value);
        formData.append('image', document.getElementById('image').files[0]);

        store('/admin/technicians', formData);
    }

</script>
@endsection
