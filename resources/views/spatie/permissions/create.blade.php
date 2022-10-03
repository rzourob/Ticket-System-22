
@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="{{asset('assets/js/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/js/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@section('title')
    أضافة صلاحيات
@stop
@endsection
@section('PageTitle')
<!-- breadcrumb -->
@section('PageTitle2')
أضافة صلاحيات
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12">
        <div class="card card-statistics h-100">
            <div class="card-body">

                <form>
                    <h4 style="font-family: 'Cairo', sans-serif"> أضافة صلاحيات</h4>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row -->
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
                            <div class="col">
                                <label>أسم المسؤولية</label>
                                        <select class="form-control guards" id="guards" style="width: 100%;">
                                            <option value="">يرجى اختيار المسؤولية<option>
                                                <option value="web"> رئيس قسم<option>
                                                <option value="admin"> مدير النظام<option>
                                                <option value="technician">فني صيانة<option>
                                        </select>
                            </div>
                        </div> 

                        <div class="col-md-6">
                            <div class="col">
                                <label for="name">أسم الصلاحية</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Enter name">
                            </div>
                        </div> 
                    </div>
                        <br>
                    <!-- /.card-body -->
                    <div class="modal-footer">
                        <button type="button" onclick="performStore()" class="btn btn-primary">أضافة صلاحيات</button>
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
<script>

    //Initialize Select2 Elements
    $('.guards').select2({
    theme: 'bootstrap4'
    })
    
    function performStore(){
        let data = {
            guard_name: document.getElementById('guards').value,
            name: document.getElementById('name').value,
            
        };

        store('/admin/permissions',data);
    }
</script>
@endsection

