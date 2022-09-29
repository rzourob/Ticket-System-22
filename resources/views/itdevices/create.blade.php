
@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="{{asset('assets/js/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/js/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@section('title')
    أضافة جهاز
@stop
@endsection
@section('PageTitle')
<!-- breadcrumb -->
@section('PageTitle2')
أضافة جهاز

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
                <form id="create_form" autocomplete="off" >
                    @csrf
                    <div class="card-body">
                       <form >
                            <table class="col-md-4" >
                                <h4 class="col mr-sm-2 card-title">بيانات الجهاز</h4>
                            </table>

                            <div class="row"> 
                                <div class="col-md-4 mb-30">
                                    <div class="col">
                                        <label for="title_ar" class="mr-sm-2">باركود الجهاز</label>
                                        <input type="text" name="codeDevices" class="form-control" id="codeDevices"
                                        placeholder="ادخل باركود الجهاز">
                                    </div>
                                </div> 
                                
                                <div class="col-md-4">
                                    <div class="col">
                                        <label for="title_en" class="mr-sm-2">نوع الجهاز</label>
                                        <input type="text" name="deviceTypes" class="form-control" id="deviceTypes"
                                        placeholder="ادخل نوع الجهاز">
                                    </div>
                                </div> 

                                <div class="col-md-4">
                                    <div class="col">
                                        <label for="title_en" class="mr-sm-2">أسم الجهاز </label>
                                        <input type="text" name="title" class="form-control" id="title"
                                        placeholder="ادخل اسم الجهاز">
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-4 mb-30">
                                    <div class="col">
                                        <label for="title_ar" class="mr-sm-2">SN</label>
                                        <input type="text" name="sn" class="form-control" id="sn"
                                        placeholder="ادخل SN">
                                    </div>
                                </div> 
                                
                                <div class="col-md-4">
                                    <div class="col">
                                        <label for="title_en" class="mr-sm-2">أسم القسم </label>
                                        <input type="text" name="department_id" class="form-control" id="department_id"
                                        placeholder="ادخل اسم القسم">
                                    </div>
                                </div> 

                                <div class="col-md-4">
                                    <div class="col">
                                        <label for="title_en" class="mr-sm-2">أسم الوحدة </label>
                                        <input type="text" name="sub_department_id" class="form-control" id="sub_department_id"
                                        placeholder="ادخل اسم الوحدة">
                                    </div>
                                </div>
                        
                            </div>

                        </form>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div  >
                    {{-- <table class="card-title ">
                        <h4 class="card-title">معلومات الشركة المصنعة</h4>
                    </table> --}}
                </div>
                <!-- form start -->
                <form id="create_form" autocomplete="off" >
                    <div class="card-body">
                        <form>
                            <table class="col-md-4" >
                                <h4 class="col mr-sm-2 card-title">معلومات الشركة المصنعة</h4>
                            </table>
                            <div class="row">

                                    <div class="col-md-3 mb-30">
                                        <div class="col">
                                            <label for="title_ar" class="mr-sm-2">الشركة المصنعة</label>
                                            <input type="text" name="manufacturer" class="form-control" id="manufacturer"
                                            placeholder="ادخل اسم الشركة المصنعة">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3 mb-30">
                                        <div class="col">
                                            <label for="title_ar" class="mr-sm-2">موديل الجهاز</label>
                                            <input type="text" name="model" class="form-control" id="model"
                                            placeholder="ادخل موديل الجهاز">
                                        </div>
                                    </div> 

                                    <div class="col-md-3">
                                        <div class="col">
                                            <label for="title_en" class="mr-sm-2">الشركة الموردة</label>
                                            <input type="text" name="supplier" class="form-control" id="supplier"
                                            placeholder="ادخل اسم الشركة الموردة">
                                        </div>
                                    </div> 
                                    
                                    <div class="col-md-3">
                                        <div class="col">
                                            <label for="title_en" class="mr-sm-2">فترة الضمانة</label>
                                            <input type="text" name="warranty" class="form-control" id="warranty"
                                            placeholder="ادخل فترة الضمان">
                                        </div>
                                    </div>

                            </div>

                            <div class="row">

                                    <div class="col-md-12 mb-30">
                                        <div class="col">
                                            <label for="description">وصف القسم</label>
                                            <textarea class="form-control" style="resize: none;"  type="text" id="description" name="description" rows="4"
                                                placeholder="وصف القسم" cols="50"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" name="active"class="form-check-input" id="active">
                                        <label class="form-check-label" for="active">تفعيل</label>
                                    </div>
                                
                            </div>                    
                            <!-- /.card-body -->
                            <div class="modal-footer">
                                <button type="button" onclick="performStore()" class="btn btn-primary">أنشاء قسم</button>
                            </div>
                        </form> 
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
    function performStore(){
        let data = {
            title: document.getElementById('title').value,
            // title_en: document.getElementById('title_en').value,
            description: document.getElementById('description').value,
            active: document.getElementById('active').checked,
        };
            
        store('/admin/itdevices',data);
    }
</script>
@endsection

