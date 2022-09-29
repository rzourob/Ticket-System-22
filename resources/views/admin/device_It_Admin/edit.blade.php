@extends('layouts.master')
@section('css')
<!---Internal Fileupload css-->
<link href="{{ URL::asset('assets/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
<!---Internal Fancy uploader css-->
<link href="{{ URL::asset('assets/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />

<link rel="stylesheet" href="{{asset('assets/js/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/js/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@section('title')
تعديل البيانات 
@stop
@endsection
@section('PageTitle')
<!-- breadcrumb -->
@section('PageTitle2')
تعديل بيانات 

@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <form>
                    <h4 style="font-family: 'Cairo', sans-serif"> تعديل بيانات الجهاز </h4>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row -->
{{-- <div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <!-- form start -->
                <form id="create_form" autocomplete="off">
                    @csrf
                    <div class="card-body">
                        <form>
                            <table class="col-md-4">
                                <h4 class="col mr-sm-2 card-title">بيانات الجهاز</h4>
                            </table>

                            <div class="row">
                                <div class="col-md-4 mb-30">
                                    <div class="col">
                                        <label for="codeDevices" class="mr-sm-2">باركود الجهاز</label>
                                        <input type="text" name="codeDevices" class="form-control" id="codeDevices"
                                            placeholder="ادخل باركود الجهاز" value="{{ $devices->codeDevices }}">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <!-- select -->
                                    <div class="form-group">
                                        <label> نوع الجهاز</label>
                                        <select class="custom-select" id="deviceTypes">
                                            <option value=""> اختارح نوع الجهاز</option>
                                            <option value="1"
                                                {{ $devices->deviceTypes == '1' ? 'selected' : '' }}> جهاز طبي</option>
                                            <option value="2"
                                                {{ $devices->deviceTypes == '2' ? 'selected' : '' }}>تكنولوجيا
                                                المعلومات</option>
                                            <option value="3"
                                                {{ $devices->deviceTypes == '3' ? 'selected' : '' }}>هندسة وصيانة
                                            </option>>
                                        </select>
                                    </div>
                                </div>



                                <div class="col-md-4">
                                    <div class="col">
                                        <label for="title" class="mr-sm-2">أسم الجهاز </label>
                                        <input type="text" name="title" class="form-control" id="title"
                                            placeholder="ادخل اسم الجهاز" value="{{ $devices->title }}">
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-4 mb-30">
                                    <div class="col">
                                        <label for="sn" class="mr-sm-2">SN</label>
                                        <input type="text" name="sn" class="form-control" id="sn"
                                            placeholder="ادخل SN" value="{{ $devices->sn }}">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label> القسم</label>
                                        <select class="custom-select" id="departments">
                                            <option value="">أختار القسم</option>
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}"
                                                    {{ $department->id == $devices->department->id ? 'selected' : '' }}>
                                                    {{ $department->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label> القسم</label>
                                        <select class="custom-select" id="subdepartments" name="subdepartments"
                                            style="width: 100%;">
                                            <option value="">أختار القسم</option>
                                            @foreach ($subdepartments as $subdepartment)
                                                <option value="{{ $subdepartment->id }}"
                                                    {{ $subdepartment->id == $devices->subdepartment->id ? 'selected' : '' }}>
                                                    {{ $subdepartment->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>

                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}

<div class="row">   
    <div class="col-md-12 mb-30">     
      <div class="card card-statistics h-100"> 
        <div class="card-body">    
          <h5 class="card-title" style="font-family: 'Cairo', sans-serif">بيانات الجهاز</h5>
          <form >
            <div class="row"> 
                <div class="col-md-4 mb-30">
                    <div class="col">
                        <label for="codeDevices" class="mr-sm-2">باركود الجهاز</label>
                        <input type="text" name="codeDevices" class="form-control" id="codeDevices"
                        placeholder="ادخل باركود الجهاز" value="{{ $devices->codeDevices }}">
                    </div>
                </div> 

                <div class="col-sm-3">
                    <!-- select -->
                    <div class="form-group">
                        <label> نوع الجهاز</label>
                      <select class="custom-select"   id="deviceTypes">
                        <option value=""> اختارح نوع الجهاز</option>
                        <option value="1" {{ $devices->deviceTypes == '1' ? 'selected' : '' }} > جهاز طبي</option>
                        <option value="2" {{ $devices->deviceTypes == '2' ? 'selected' : '' }}>تكنولوجيا المعلومات</option>
                        <option value="3" {{ $devices->deviceTypes == '3' ? 'selected' : '' }}>هندسة وصيانة</option>
                      </select>
                    </div>
                  </div>

                <div class="col-md-4">
                    <div class="col">
                        <label for="title" class="mr-sm-2">أسم الجهاز </label>
                        <input type="text" name="title" class="form-control" id="title"
                        placeholder="ادخل اسم الجهاز" value="{{ $devices->title }}">
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-md-3 mb-30">
                    <div class="col">
                        <label for="sn" class="mr-sm-2">SN</label>
                        <input type="text" name="sn" class="form-control" id="sn"
                        placeholder="ادخل SN" value="{{ $devices->sn }}">
                    </div>
                </div> 

                <div class="col-md-3">
                    <div class="form-group">
                        <label> القسم</label>
                        <select class="custom-select" id="departments" style="width: 100%;">
                            <option value="">أختار القسم</option>
                            @foreach ($departments as $department)
                            <option value="{{$department->id}}"{{ $department->id == $devices->department->id ? 'selected' : '' }}>{{$department->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label> الوحدة</label>
                        {{-- <select class="custom-select" id="subdepartments" >
                            <option value="">أختار القسم</option>
                            @foreach ($subdepartments as $subdepartment)
                            <option value="{{$subdepartment->id}}">{{$subdepartment->title}}</option>
                            @endforeach
                        </select> --}}
                        <input type="text" name="subdepartments" class="form-control" id="sub_department_id"
                        placeholder="" value="{{ $devices->sub_department_id }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="col">
                        <label for="room" class="mr-sm-2">رقم الغرفة</label>
                        <input type="text" name="room" class="form-control" id="room"
                        placeholder="ادخل رقم الغرفة" value="{{ $devices->room }}">
                    </div>
                </div>
            </div>
        </form>
        </div>
      </div>   
    </div>
    <div class="col-md-12 mb-30">     
      <div class="card card-statistics h-100"> 
        <div class="card-body">   
          <h5 class="card-title" style="font-family: 'Cairo', sans-serif">معلومات الشركة المصنعة</h5>
          <form>
            <div class="row">

                    <div class="col-md-3 mb-30">
                        <div class="col">
                            <label for="manufacturer" class="mr-sm-2">الشركة المصنعة</label>
                            <input type="text" name="manufacturer" class="form-control" id="manufacturer"
                            placeholder="ادخل اسم الشركة المصنعة" value="{{ $devices->manufacturer }}">
                        </div>
                    </div>
                    
                    <div class="col-md-3 mb-30">
                        <div class="col">
                            <label for="model" class="mr-sm-2">موديل الجهاز</label>
                            <input type="text" name="model" class="form-control" id="model"
                            placeholder="ادخل موديل الجهاز" value="{{ $devices->model }}">
                        </div>
                    </div> 

                    <div class="col-md-3">
                        <div class="col">
                            <label for="supplier" class="mr-sm-2">الشركة الموردة</label>
                            <input type="text" name="supplier" class="form-control" id="supplier"
                            placeholder="ادخل اسم الشركة الموردة" value="{{ $devices->supplier }}">
                        </div>
                    </div> 
                    
                    <div class="col-md-3">
                        <div class="col">
                            <label for="warranty" class="mr-sm-2">فترة الضمانة</label>
                            <input type="text" name="warranty" class="form-control" id="warranty"
                            placeholder="ادخل فترة الضمان" value="{{ $devices->warranty }}">
                        </div>
                    </div>

            </div>

            <div class="row">

                    <div class="col-md-12 mb-30">
                        <div class="col">
                            <label for="description">ملاحظات</label>
                            <textarea class="form-control" style="resize: none;"  type="text" id="description" name="description" rows="4"
                                placeholder="وصف القسم" cols="50">{{ $devices->description }}</textarea>
                        </div>
                    </div>

                                      
                    <div class="col-md-12 mb-30">
                        <div class="custom-file">
                                    <p class="text-danger">* صيغة الصورة الشخصية pdf, jpeg ,.jpg , png </p>
                            <input type="file" name="image" id="image" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
                                data-height="70" />
                        </div>
                    </div>

                    <div class="col-md-12 mb-30">

                        <div class="form-check">
                            <input type="checkbox" name="active"class="form-check-input" id="active">
                            <label class="form-check-label" for="active">تفعيل</label>
                        </div>
                    </div>
        </div>

            <!-- /.card-body -->
            <div class="modal-footer">
                <button type="button" onclick="performUpdate()" class="btn btn-primary">أنشاء قسم</button>
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
    function performUpdate(){
        let formData = new FormData();
        formData.append('_method','PUT');
        formData.append('codeDevices',document.getElementById('codeDevices').value);
        formData.append('title',document.getElementById('title').value);
        formData.append('deviceTypes',document.getElementById('deviceTypes').value);
        formData.append('manufacturer',document.getElementById('manufacturer').value);
        formData.append('model',document.getElementById('model').value);
        formData.append('room',document.getElementById('room').value);
        formData.append('sn',document.getElementById('sn').value);
        formData.append('supplier',document.getElementById('supplier').value);
        formData.append('warranty',document.getElementById('warranty').value);
        formData.append('description',document.getElementById('description').value );
        formData.append('department_id',document.getElementById('departments').value);
        formData.append('sub_department_id',document.getElementById('sub_department_id').value);
        formData.append('active',document.getElementById('active').checked ? "1" : "0");     
        formData.append('image',document.getElementById('image').files[0]);

        store('/admin/devices_It/update/{{$devices->id}}',formData);
    }


   
</script>
@endsection
