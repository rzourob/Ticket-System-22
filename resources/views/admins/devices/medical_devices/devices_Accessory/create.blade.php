
@extends('layouts.master')
@section('css')
<!---Internal Fileupload css-->
<link href="{{ URL::asset('assets/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
<!---Internal Fancy uploader css-->
<link href="{{ URL::asset('assets/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />

<link rel="stylesheet" href="{{asset('assets/js/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/js/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@section('title')
    أضافة ملحق للجهاز
@stop
@endsection
@section('PageTitle')
<!-- breadcrumb -->
@section('PageTitle2')
أضافة ملحق للجهاز

@stop
<!-- breadcrumb -->
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <form>
                    <h4 style="font-family: 'Cairo', sans-serif"> أضافة ملحق جديد </h4>
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
          <h5 class="card-title" style="font-family: 'Cairo', sans-serif">بيانات الملحق</h5>
          <form id="create_form">
            <div class="row">

                <div class="col-md-2 mb-30">
                    <div class="col">

                        <input type="hidden" id="device_id" name="device_id" value="{{ $devices->id }}">


                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-6">
                    <div class="col">
                        <label for="title" class="mr-sm-2">أسم الملحق</label>
                        <input type="text" name="title"
                            class="form-control" id="title"
                            placeholder="يرجي أدخال اسم الملحق">
                    </div>
                </div>

                <div class="col-md-6 ">
                    <div class="col">
                        <label for="sn" class="mr-sm-2">سيريل نمبر
                            الملحق</label>
                        <input type="text" name="sn"
                            class="form-control" id="sn"
                            placeholder="يرجي ادخال سيريل نمبر للملحق">
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12 mb-30">
                    <div class="col">
                        <label for="description">وصف الملحق</label>
                        <textarea class="form-control" style="resize: none;" type="text" id="description" name="description" rows="4"
                            placeholder="وصف الملحق" cols="50"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">

                                  
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
            <div class="modal-footer">
                <button type="button" onclick="performStore()"
                    class="btn btn-primary">أنشاء قسم</button>
            </div>
        </form>
        </div>
      </div>   
    </div>

</div>

<!-- row closed -->
@endsection
<!-- row closed -->
@section('js')
<script type="text/javascript">
    function performStore() {

        let formData = new FormData();
        formData.append('title', document.getElementById('title').value);
        formData.append('sn', document.getElementById('sn').value);
        formData.append('image',document.getElementById('image').files[0]);
        formData.append('description', document.getElementById('description').value);
        formData.append('active', document.getElementById('active').value);
        formData.append('device_id', document.getElementById('device_id').value);
        store('/admin/Accessory_Medi/store', formData);

    }
</script>
@endsection
