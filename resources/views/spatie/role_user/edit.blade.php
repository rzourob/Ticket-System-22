
@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="{{asset('admin/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
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

                        <h3 class="card-title">Create Roles</h3>

                      <form id="create_form">
                        @csrf
                        <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="col">
                                        <label>{{trans('roles_trans.guard_name')}}</label>
                                                 <select class="form-control guards" id="guards" style="width: 100%;">
                                                          <option value="admin" @if($role->guard_name == 'admin') selected @endif>Admin
                                                          <option>
                                                          <option value="web" @if($role->guard_name == 'web') selected @endif> Web
                                                          <option>
                                                          <option value="professional" @if($role->guard_name == 'professional') selected @endif> Professional
                                                          <option>
                                                          <option value="customer" @if($role->guard_name == 'customer') selected @endif> Customer
                                                          <option>
                                                    </select>
                                    </div>

                                </div> 

                                <div class="col-md-6">
                                    <div class="col">
                                         <label for="name">{{trans('roles_trans.name')}}</label>
                                            <input type="text" name="name" class="form-control" id="name" value="{{$role->name}}"
                                               placeholder="Enter name">
                                    </div>
                                </div> 
                    
                        </div>

                            <br>

                        
                        <!-- /.card-body -->

                            <div class="modal-footer">
                            <button type="button" onclick="performUpdate({{$role->id}})" class="btn btn-primary">تعديل البيانات</button>
                            </div>
                    </form>

            </div>              
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
<link rel="stylesheet" href="{{asset('admin/plugins/select2/css/select2.min.css')}}">
<script src="{{asset('admin/plugins/select2/js/select2.full.min.js')}}"></script>
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

        let redirectUrl = '/ar/roles'
        update('/hamad/SS/roles/'+id,data,redirectUrl);
    }
</script>
@endsection
