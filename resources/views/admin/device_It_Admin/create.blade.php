
@extends('layouts.master')
@section('css')
<!---Internal Fileupload css-->
<link href="{{ URL::asset('assets/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
<!---Internal Fancy uploader css-->
<link href="{{ URL::asset('assets/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />

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
<div class="row">
    <div class="col-md-12">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <form>
                    <h4 style="font-family: 'Cairo', sans-serif"> أضافة جهاز جديد </h4>
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
          <h5 class="card-title" style="font-family: 'Cairo', sans-serif">بيانات الجهاز</h5>
          <form id="create_form">
            <div class="row"> 
                <div class="col-md-4 mb-30">
                    <div class="col">
                        <label for="codeDevices" class="mr-sm-2">باركود الجهاز</label>
                        <input type="text" name="codeDevices" class="form-control" id="codeDevices"
                        placeholder="ادخل باركود الجهاز" >
                    </div>
                </div> 

                <div class="col-sm-3">
                    <!-- select -->
                    <div class="form-group">
                        <label> نوع الجهاز</label>
                      <select class="custom-select"   id="deviceTypes">
                        <option value=""> اختارح نوع الجهاز</option>
                        <option value="1" > جهاز طبي</option>
                        <option value="2">تكنولوجيا المعلومات</option>
                        <option value="3">هندسة وصيانة</option>
                      </select>
                    </div>
                  </div>

                <div class="col-md-4">
                    <div class="col">
                        <label for="title" class="mr-sm-2">أسم الجهاز </label>
                        <input type="text" name="title" class="form-control" id="title"
                        placeholder="ادخل اسم الجهاز">
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-md-3 mb-30">
                    <div class="col">
                        <label for="sn" class="mr-sm-2">SN</label>
                        <input type="text" name="sn" class="form-control" id="sn"
                        placeholder="ادخل SN">
                    </div>
                </div> 

                <div class="col-md-3">
                    <div class="form-group">
                        <label> القسم</label>
                        <select class="custom-select" id="departments" style="width: 100%;">
                            <option value="">أختار القسم</option>
                            @foreach ($departments as $department)
                            <option value="{{$department->id}}">{{$department->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label> القسم</label>
                        <select class="custom-select" id="subdepartments" >
                            <option value="">الوحدة</option>
                            {{-- @foreach ($subdepartments as $subdepartment)
                            <option value="{{$subdepartment->id}}">{{$subdepartment->title}}</option>
                            @endforeach --}}
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="col">
                        <label for="room" class="mr-sm-2">رقم الغرفة</label>
                        <input type="text" name="room" class="form-control" id="room"
                        placeholder="ادخل رقم الغرفة">
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
                            placeholder="ادخل اسم الشركة المصنعة">
                        </div>
                    </div>
                    
                    <div class="col-md-3 mb-30">
                        <div class="col">
                            <label for="model" class="mr-sm-2">موديل الجهاز</label>
                            <input type="text" name="model" class="form-control" id="model"
                            placeholder="ادخل موديل الجهاز">
                        </div>
                    </div> 

                    <div class="col-md-3">
                        <div class="col">
                            <label for="supplier" class="mr-sm-2">الشركة الموردة</label>
                            <input type="text" name="supplier" class="form-control" id="supplier"
                            placeholder="ادخل اسم الشركة الموردة">
                        </div>
                    </div> 
                    
                    <div class="col-md-3">
                        <div class="col">
                            <label for="warranty" class="mr-sm-2">فترة الضمانة</label>
                            <input type="text" name="warranty" class="form-control" id="warranty"
                            placeholder="ادخل فترة الضمان">
                        </div>
                    </div>

            </div>

            <div class="row">

                    <div class="col-md-12 mb-30">
                        <div class="col">
                            <label for="description">ملاحظات</label>
                            <textarea class="form-control" style="resize: none;"  type="text" id="description" name="description" rows="4"
                                placeholder="وصف القسم" cols="50"></textarea>
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
                <button type="button" onclick="performStore()" class="btn btn-primary">أضافة جهاز</button>
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

    $('#subdepartments').attr('disabled',true);
    
    $('#departments').on('change', function() {
    
    $('#subdepartments').attr('disabled',this.value == -1);
    
        if(this.value != -1){
            // alert (this.value);
            getSubdepartments(this.value);
    
            // console.log(getSubdepartments);
    
        }
    
        function getSubdepartments(departmentId) {
    
            axios.get(`/admin/departments/${departmentId}`)
    
            .then(function (response) {
                console.log(response);
                if(response.data.subDepartment.length !=0){
                    $('#subdepartments').empty();
                       $.each(response.data.subDepartment , function(i,item){
                        $('#subdepartments').append(new Option(item['title'], item['id']))
                       });
                }else{
                    $('#subdepartments').attr('disabled',true);
                }
            })
    
        }  
    })
    
    </script>
    
<script>


     //Initialize Select2 Elements
     $('.departments').select2({
    theme: 'bootstrap4'
    })

     //Initialize Select2 Elements
     $('.subdepartments').select2({
    theme: 'bootstrap4'
    })

    //  //Initialize Select2 Elements
    //  $('.deviceTypes').select2({
    // theme: 'bootstrap4'
    // })

    // function performStore(){
    //     let data = {
    //         codeDevices: document.getElementById('codeDevices').value,
    //         title: document.getElementById('title').value,
    //         // title_en: document.getElementById('title_en').value,
    //         deviceTypes: document.getElementById('deviceTypes').value,
    //         manufacturer: document.getElementById('manufacturer').value,
    //         model: document.getElementById('model').value,
    //         sn: document.getElementById('sn').value,
    //         supplier: document.getElementById('supplier').value,
    //         warranty: document.getElementById('warranty').value,
    //         // description: document.getElementById('image').value,
    //         description: document.getElementById('description').value,
    //         // Created_by: document.getElementById('Created_by').value,
    //         department_id: document.getElementById('departments').value,
    //         sub_department_id: document.getElementById('subdepartments').value,
    //         active: document.getElementById('active').checked,
    //     };
            
    //     store('/devices',data);
    // }

    function performStore(){
        let formData = new FormData();
        
        formData.append('codeDevices',document.getElementById('codeDevices').value);
        formData.append('title',document.getElementById('title').value);
        formData.append('deviceTypes',document.getElementById('deviceTypes').value);
        formData.append('manufacturer',document.getElementById('manufacturer').value);
        formData.append('model',document.getElementById('model').value);
        formData.append('room',document.getElementById('room').value);
        formData.append('sn',document.getElementById('sn').value);
        formData.append('supplier',document.getElementById('supplier').value);
        formData.append('warranty',document.getElementById('warranty').value);
        formData.append('description',document.getElementById('description').checked ? "M" : "F");
        formData.append('department_id',document.getElementById('departments').value);
        formData.append('sub_department_id',document.getElementById('subdepartments').value);
        formData.append('active',document.getElementById('active').value);     
        formData.append('image',document.getElementById('image').files[0]);

       store('/admin/devices_It/store',formData);
    }

</script>

<script>

    $('#subdepartments').attr('disabled',true);
    
    $('#departments').on('change', function() {
    
    $('#subdepartments').attr('disabled',this.value == -1);
    
        if(this.value != -1){
            // alert (this.value);
            getSubdepartments(this.value);
    
            // console.log(getSubdepartments);
    
        }
    
        function getSubdepartments(departmentId) {
    
            // axios.get(`/admin/departments/${departmentId}`)
    
         axios.get(`/departments/${departmentId}`)
    
    
            .then(function (response) {
                console.log(response);
                if(response.data.subDepartment.length !=0){
                    $('#subdepartments').empty();
                       $.each(response.data.subDepartment , function(i,item){
                        $('#subdepartments').append(new Option(item['title'], item['id']))
                       });
                }else{
                    $('#subdepartments').attr('disabled',true);
                }
            })
    
        }  
    })
    
    </script>
    
@endsection

