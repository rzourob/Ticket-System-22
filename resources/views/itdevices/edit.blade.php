

@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="{{asset('assets/js/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/js/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@section('title')
    Create Roles
@stop
@endsection
@section('PageTitle')
<!-- breadcrumb -->
@section('PageTitle2')
Create Roles
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
                                <div class="col">
                                    <label for="title_ar" class="mr-sm-2">أسم القسم</label>
                                    <input type="text" name="title" class="form-control" id="title" value="{{$department->title}}"
                                    placeholder="ادخل اسم القسم باللغة العربية">
                                </div>
                            </div> 
                            

                            <div class="col-md-6">
                                <div class="col">
                                     <label for="title_en" class="mr-sm-2">أسم القسم</label>
                                     <input type="text" name="title_en" class="form-control" id="title_en" value="{{$department->title_en}}"
                                       placeholder="ادخل اسم المدينة القسم الانجيليزية">
                                </div>
                            </div> 
                       
                    </div>

                    <br>

                       <div class="row">
                             <div class="col-md-12">
                                 <div class="col">
                                       <label for="description">وصف القسم</label>
                                       <textarea class="form-control" style="resize: none;"  type="text" id="description" name="description" rows="4"
                                        placeholder="وصف القسم" cols="50" >{{$department->description}}</textarea>
                                 </div>
                             </div>
                        </div>

                        <br>

                        <div class="form-check">
                            <input type="checkbox" name="active"class="form-check-input" id="active" 
                            @if($department->active) checked @endif>
                            <label class="form-check-label" for="active">تفعيل</label>
                        </div>
                    </div>
                    <!-- /.card-body -->

                        <div class="modal-footer">
                            <button type="button" onclick="performUpdate({{$department->id}})" class="btn btn-primary">تعديل البيانات</button>
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

    function performUpdate(id){
        let data = {
            title: document.getElementById('title').value,
            // title_en: document.getElementById('title_en').value,
            description: document.getElementById('description').value,
            active: document.getElementById('active').checked,
            
        };

        let redirectUrl = '/admin/departments'
        update('/admin/departments/'+id,data,redirectUrl);
    }
</script>
@endsection

