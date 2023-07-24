
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

<div class="card-body">
    <!-- Large modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">أضافة ملحق</button> 
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <div class="modal-title"><div class="mb-10">
              <h4 style="font-family: 'Cairo', sans-serif">أضافة ملحق جديد</h4>
            </div>
            </div>
          </div>
          <div class="modal-body">

            <form id="create_form">
                @csrf

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
                            class="btn btn-primary">أضافة ملحق</button>
                    </div>
            </form>

          </div>

        </div>
      </div>
    </div>
</div>

<div class="row">   
    <div class="col-md-12 mb-30">     
      <div class="card card-statistics h-100"> 
        <div class="card-body">    
          <h5 class="card-title" style="font-family: 'Cairo', sans-serif">بيانات الملحق</h5>
          
        <table id="example2" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>
                        <h6 style="font-family: 'Cairo', sans-serif">ID
                        </h6>
                    </th>

                    <th>
                        <h6 style="font-family: 'Cairo', sans-serif">أسم الجهاز الرئيسي
                        </h6>
                    </th>

                    <th>
                        <h6 style="font-family: 'Cairo', sans-serif">أسم الملحق
                        </h6>
                    </th>

                    <th>
                        <h6 style="font-family: 'Cairo', sans-serif">السيريل نمبر الملحق
                            الاضافة</h6>
                    </th>

                    <th>
                        <h6 style="font-family: 'Cairo', sans-serif">صورة الملحق
                        </h6>
                    </th>

                    <th>
                        <h6 style="font-family: 'Cairo', sans-serif">وصف
                        </h6>
                    </th>

                    <th>
                        <h6 style="font-family: 'Cairo', sans-serif">اسم الموظف
                        </h6>
                    </th>

                    <th>
                        <h6 style="font-family: 'Cairo', sans-serif">الاجراءات
                        </h6>
                    </th>
                </tr>
            </thead>

            <tbody>

                <?php $i=0; ?>

                @foreach ($accessorymedicals as $accessorymedical)

                <?php $i++; ?>
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $accessorymedical->device->title }}</td>
                        <td>{{ $accessorymedical->title }}</td>
                        <td>{{ $accessorymedical->sn }}</td>
                        <td>
                            <div class="form-group">
                                <div class="form-group">
                                    <img class="profile-user-img img-fluid img-circle"
                                        style="width:150px; height:100px;"
                                        src="{{ Storage::url('public/accessorymedicals/' . $accessorymedical->image ?? '') }}"
                                        alt="User profile picture">
                                </div>
                            </div>
                        </td>
                        <td>{{ $accessorymedical->description }}</td>
                        <td>{{ $accessorymedical->Created_by }}</td>
                        <td>
                            <div class="btn-group">

                                <a class="btn btn-info"
                                    href="{{ route('View_Image_Admin', $accessorymedical->id) }}"
                                    target="_blank" role="button">عرض
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>

                                <a href="#"
                                    onclick="performDestroy({{ $accessorymedical->id }},this)  "
                                    class="btn btn-danger">حذف
                                    <i class="fa fa-trash"></i>
                                </a>

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
