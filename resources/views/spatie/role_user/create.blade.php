
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
                                        <label>{{trans('role_trans.guard_name')}}</label>
                                                 <select class="form-control guards" id="guards" style="width: 100%;">
                                                          <option value="admin">Admin
                                                          <option>
                                                          <option value="web"> Web
                                                          <option>
                                                          <option value="professional"> Professional
                                                          <option>
                                                          <option value="customer"> Customer
                                                          <option>
                                                    </select>
                                    </div>

                                </div> 

                                <div class="col-md-6">
                                    <div class="col">
                                         <label for="name">{{trans('role_trans.name')}}</label>
                                            <input type="text" name="name" class="form-control" id="name"
                                               placeholder="Enter name">
                                    </div>
                                </div> 
                    
                        </div>

                            <br>

                        
                        <!-- /.card-body -->

                            <div class="modal-footer">
                              <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
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
    
    function performStore(){
        let data = {
            guard_name: document.getElementById('guards').value,
            name: document.getElementById('name').value,
            
        };

        store('/hamad/SS/roles',data);
    }
</script>
@endsection
