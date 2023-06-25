@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="{{asset('assets/js/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/js/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@section('title')
    أنشاء وحدة 
@stop
@endsection
@section('PageTitle')
<!-- breadcrumb -->
@section('PageTitle2')
أنشاء وحدة  
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
                    <h4 style="font-family: 'Cairo', sans-serif"> أنشاء وحدة جديدة    </h4>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <!-- form start -->

                <form id="create_form">
                    @csrf
                        <div class="card-body">
                            {{-- <div class="row">
                                <div class="col-md-4">
                                    <div class="col-md-6 mb-30">
                                        <div class="col">
                                            <label for="problem" class="mr-sm-2">موضوع المشكلة</label>
                                            <select class="custom-select" name="problem" id="problem">
                                                <option value=""> اختارح نوع المشكلة</option>
                                                <option value="1">software</option>
                                                <option value="2">hardware</option>
                                            </select>
                                        </div
                                </div>                 
                            </div> --}}
                    <br>
                            <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="col">
                                            <label for="problem_title" class="mr-sm-2">أسم القسم</label>
                                            <input type="text" name="problem_title" class="form-control" id="problem_title"
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
                                            <label for="problem_description">وصف القسم</label>
                                            <textarea class="form-control" style="resize: none;"  type="text" id="problem_description" name="problem_description" rows="4"
                                            placeholder="وصف القسم" cols="50"></textarea>
                                        </div>
                                    </div>
                            </div>

                    <br>

                            <div class="form-check">
                                <input type="checkbox" name="active"class="form-check-input" id="active">
                                <label class="form-check-label" for="active">تفعيل</label>
                            </div>
                    </div>
                    <!-- /.card-body -->

                            <div class="modal-footer">
                                <button type="button" onclick="performStore()" class="btn btn-primary">أضافة عطل</button>
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

function performStore(){
   let data = {
    problem: document.getElementById('problem').value,
    title: document.getElementById('title').value,             
       title_en: document.getElementById('title_en').value,
    description: document.getElementById('description').value,
       active: document.getElementById('active').checked,
   };
       
   store('/admin/problems',data);
}
</script>
@endsection

