
@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="{{asset('assets/js/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/js/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@section('title')
    أنشاء قسم فرعي
@stop
@endsection
@section('PageTitle')
<!-- breadcrumb -->
@section('PageTitle2')
أنشاء قسم فرعي
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
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="col">
                                        <label>القسم الرئيسي</label>
                                        <select class="form-control departments" id="departments" style="width: 100%;">
                                            <option value="">أختار القسم</option>
                                            @foreach ($departments as $department)
                                            <option value="{{$department->id}}" {{ $department->id == $subdepartments->department_id ? 'selected' : '' }}>{{$department->title}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>                 
                            </div>
                    <br>
                            <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="col">
                                            <label for="title" class="mr-sm-2">أسم القسم</label>
                                            <input type="text" name="title" class="form-control" id="title" value="{{$subdepartments->title}}"
                                            placeholder="ادخل اسم القسم باللغة العربية">
                                        </div>
                                    </div> 
                                    

                                    <div class="col-md-6">
                                        <div class="col">
                                            <label for="title_en" class="mr-sm-2">أسم القسم</label>
                                            <input type="text" name="title_en" class="form-control" id="title_en" 
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
                                            placeholder="وصف القسم" cols="50">{{$subdepartments->description}}</textarea>
                                        </div>
                                    </div>
                            </div>

                    <br>

                            <div class="form-check">
                                <input type="checkbox" name="active"class="form-check-input" id="active"
                                @if($subdepartments->active) checked @endif>
                                <label class="form-check-label" for="active">تفعيل</label>
                            </div>
                    </div>
                    <!-- /.card-body -->

                            <div class="modal-footer">
                                <button type="button" onclick="performUpdate({{$subdepartments->id}})" class="btn btn-primary">تعديل البيانات</button>
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
         
    $('.departments').select2({
   theme: 'bootstrap4'
   });

function performUpdate(id){
   let data = {
       department_id: document.getElementById('departments').value,
       title: document.getElementById('title').value,             
       title_en: document.getElementById('title_en').value,
       description: document.getElementById('description').value,
       active: document.getElementById('active').checked,
   };
       
   let redirectUrl = '/admin/subdepartments'
        update('/admin/subdepartments/'+id,data,redirectUrl);}
</script>
@endsection

