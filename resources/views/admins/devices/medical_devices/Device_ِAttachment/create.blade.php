
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
                {{-- {{ csrf_field() }} --}}
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="file_name" name="file_name"
                        required>

                    <input type="hidden" name="device_id" id="device_id" {{-- value="{{ $familydetails->form_no }}" --}}
                        value="{{ $devices->id }}">


                    <label class="custom-file-label" for="customFile">حدد
                        المرفق</label>
                </div><br><br>
                {{-- <button type="submit" class="btn btn-primary btn-sm "
                    name="uploadedFile">تاكيد</button> --}}
                {{-- <div class="card-footer"> --}}
                <div class="">
                    <button type="button" name="uploadedFile" onclick="performStore()"
                        class="btn btn-primary ">تاكيد</button>
                </div>
        </form>

        <br><br>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>
                        <h6 style="font-family: 'Cairo', sans-serif">ID
                        </h6>
                    </th>
                    <th>
                        <h6 style="font-family: 'Cairo', sans-serif">أسم الجهاز
                        </h6>
                    </th>
                    {{-- <th>
                        <h5 style="font-family: 'Cairo', sans-serif">السيريل
                            نمبر</h5>
                    </th> --}}
                    <th>
                        <h6 style="font-family: 'Cairo', sans-serif">أسم المرفق
                        </h6>
                    </th>
                    <th>
                        <h6 style="font-family: 'Cairo', sans-serif">تاريخ
                            الاضافة</h6>
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

                @foreach ($deviceattachments as $deviceattachment)

                <?php $i++; ?>
                    <tr>
                        <td>{{ $i }}</td>
                        {{-- <td><a href="{{ route('familydetails.show', $familydetail->id) }}"
                                class="btn btn-info">{{ $familydetail->form_no }}</a>
                        </td>  --}}

                        <td>{{ $deviceattachment->device->title }}</td>
                        <td>{{ $deviceattachment->file_name }}</td>

                        <td>{{ $deviceattachment->created_at->format('Y-m-d H:i') }}
                        </td>
                        <td>{{ $deviceattachment->Created_by }}</td>
                        <td>
                            <div class="btn-group">

                                <a class="btn btn-info"
                                    href="{{ route('View_file_Admin_pdf', $deviceattachment->id) }}"
                                    target="_blank" role="button">عرض
                                    <i class="fa fa-eye" aria-hidden="true"></i>

                                </a>

                                <a class="btn btn-secondary" href="">تحميل
                                    <i class="fas fa-cloud-download-alt"></i>

                                </a>

                                <a href="#"
                                    onclick="performDestroy({{ $deviceattachment->id }},this)  "
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
        function performStore(){

            let formData = new FormData();
            formData.append('device_id', document.getElementById('device_id').value);
            formData.append('file_name', document.getElementById('file_name').files[0]);

            store('/admin/Attachment', formData);
        }
    </script>

    <script>
        function performDestroy(id, ref) {
            confirmDestroy('/admin/Attachment/' + id, ref);

        }
    </script>
@endsection




























