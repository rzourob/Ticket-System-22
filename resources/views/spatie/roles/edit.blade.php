
@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="{{asset('assets/js/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/js/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@section('title')
    تعديل مسؤولية
@stop
@endsection
@section('PageTitle')
تعديل مسؤولية
<!-- breadcrumb -->
@section('PageTitle2')
تعديل مسؤولية
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<!-- row -->
<div class="row">
    <div class="col-md-12">
        <div class="card card-statistics h-100">
            <div class="card-body">

                <form>
                    <h4 style="font-family: 'Cairo', sans-serif"> تعديل مسؤولية </h4>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row -->
<div class="row">
    <div class="col-md-12">
        <div class="card card-statistics h-100">
            <div class="card-body">

                <form>
                    <h4 style="font-family: 'Cairo', sans-serif"> تعديل مسؤولية</h4>
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
                                <label><h5>Guards Name</h5></label>
                                <select class="form-control guards" id="guards" style="width: 100%;">
                                    <option value="">يرجى اختيار Guard<option>
                                    <option value="web" @if($role->guard_name == 'web') selected @endif>Web<option>
                                    <option value="admin" @if($role->guard_name == 'admin') selected @endif>Admin<option>
                                    <option value="technician" @if($role->guard_name == 'technician') selected @endif>Technician<option>
                                </select>
                            </div>
                        </div> 
                        <div class="col-md-6">
                            <div class="col">
                                <label for="name"><h5>Name</h5></label>
                                    <input type="text" name="name" class="form-control" id="name" value="{{$role->name}}"
                                    placeholder="يرجي أدخال اسم Roles">
                            </div>
                        </div> 
                    </div>
                    <br>
                    <!-- /.card-body -->
                    <div class="modal-footer">
                        <button type="button" onclick="performUpdate({{$role->id}})" class="btn btn-primary">تعديل مسؤولية</button>
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
     
     function performUpdate(id){
         let data = {
             guard_name: document.getElementById('guards').value,
             name: document.getElementById('name').value,
             
         };
 
         let redirectUrl = '/admin/roles'
         update('/admin/roles/'+id,data,redirectUrl);
     }
 </script>
@endsection