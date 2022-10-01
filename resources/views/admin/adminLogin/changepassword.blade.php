@extends('layouts.master')
@section('css')

@section('title')
    تغير كلمة المرور
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle2')
    تغير كلمة المرور
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <label for="password">بيانات الموظف</label>
                <form>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="first_name">الأسم الموظف</label>
                                <table class="card-title ">
                                </table>
                                <input type="text" name="name" class="form-control" id="name"
                                    value="{{ auth()->user()->name }}" disabled placeholder="أدخل الأسم المريض">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="first_name">البريد الاكتروني</label>
                                <table class="card-title ">
                                </table>
                                <input type="text" name="name" class="form-control" id="name"
                                    value="{{ auth()->user()->email }}" disabled placeholder="أدخل الأسم المريض">
                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <div class="form-group">
                                    <img class="profile-user-img img-fluid img-circle"
                                        style="width:150px; height:150px; position:absolute; top:-37px; left:100px; border-radius:50%"
                                        src="{{ Storage::url('public/' . auth()->user()->image) }}"
                                        alt="User profile picture">
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">
        {{-- <label for="password">اعدادات كلمة المرور</label> --}}
        <form>
            <!-- -->
            <div class="card">

                <!-- /.card-header -->
                <!-- form start -->
                <form id="create_form">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="password">كلمة المرور</label>
                            <input type="text" name="password" class="form-control" id="password"
                                placeholder="ادخل كلمة المرور">
                        </div>

                        <div class="form-group">
                            <label for="new_password">كلمة مرور جديدة</label>
                            <input type="text" name="new_password" class="form-control" id="new_password"
                                placeholder="ادخل كلمة المرور الجديدة">
                        </div>

                        <div class="form-group">
                            <label for="new_password_confirmation">تاكيد كلمة المرور</label>
                            <input type="text" name="new_password_confirmation" class="form-control"
                                id="new_password_confirmation" placeholder=" تاكيد كلمة المرور الجديدة">
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="col-md-12 text-center card-footer">
                        <button type="button" onclick="updatePassword()" class="btn btn-primary">تحديث</button>
                    </div>
                </form>
            </div>


            <!-- /.card -->
        </form>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
<script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>


<script>
    function updatePassword() {
        axios.put('/admin/changepassword/admin', {
                password: document.getElementById('password').value,
                new_password: document.getElementById('new_password').value,
                new_password_confirmation: document.getElementById('new_password_confirmation').value
            })
            .then(function(response) {
                toastr.success(response.data.message);
                document.getElementById('create_form').reset();
                // window.location.href = '/hamad/SS/index'
                // showToaster(response.data.message, true);
            })
            .catch(function(error) {
                //console.log("ERROR RESPONSE");
                //console.log(error.response);
                console.log(error);
                toastr.error(error.response.data.message);
                //showToaster(error.response.data.message, false);
            });
    }
</script>
@endsection
