@extends('layouts.master')
@section('css')

@section('title')
    تنقلات الجهاز
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle2')
    تنقلات الجهاز
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <form>
                    <h4 style="font-family: 'Cairo', sans-serif">عرض تفاصيل وتنقلات الجهاز</h4>
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


                <div class="tab round">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" id="home-07-tab" data-toggle="tab" href="#home-07"
                                role="tab" aria-controls="home-07" aria-selected="true"> <i class="fa fa-home"></i>
                                تفصيل الجهاز
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-07-tab" data-toggle="tab" href="#profile-07" role="tab"
                                aria-controls="profile-07" aria-selected="false">تنقلات الجهاز</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="portfolio-07-tab" data-toggle="tab" href="#portfolio-07"
                                role="tab" aria-controls="portfolio-07" aria-selected="false"><i
                                    class="fa fa-picture-o"></i> مرفقات الجهاز </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-08-tab" data-toggle="tab" href="#contact-08" role="tab"
                                aria-controls="contact-07" aria-selected="false"><i class="fa fa-check-square-o"></i>
                                محلحقات الجهاز </a>
                        </li>
                    </ul>
                    <h5 class="card-title"> </h5>

                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="home-07" role="tabpanel"
                            aria-labelledby="home-07-tab">

                            <div class="col-sm-12 invoice-col">
                                <div class="row">
                                    <div class="col-md-12 mb-60">
                                        <div class="col-sm-12 invoice-col">
                                            <!-- -->
                                            <div class="row invoice-info text-left">
                                                <div class="col-sm-4 ">
                                                </div>
                                                <div class="col-sm-5">
                                                </div>
                                                <div class="col-sm-3 ">

                                                    {{-- <img class="img-circle img-bordered-sm" height="250" with="150" src="{{Storage::url('public/patients/' . $familydetails->patient->image)}}"  alt="User profile picture"> --}}
                                                    {{-- <img class="img-circle img-bordered-sm" height="200" with="80"   src="{{Storage::url('public/devices/' . $devices->image ?? '')}}" alt="User profile picture"> --}}

                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <img class="profile-user-img img-fluid img-circle"
                                                                style="width:200px; height:200px; position:absolute; top:-1px; left:100px; border-radius:50%"
                                                                src="{{ Storage::url('public/devices/' . $devices->image ?? '') }}"
                                                                alt="User profile picture">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- -->

                            </div>
                            <br><br><br><br><br><br>

                            <!-- -->
                            <div class="row invoice-info">
                                <div class="col-sm-3 invoice-col">
                                    <address>
                                        <strong></strong><br>
                                        <h5 style="font-family: 'Cairo', sans-serif"><strong>بار كود الجهاز :
                                                {{ $devices->codeDevices }}</strong></h5><br>
                                        <h5 style="font-family: 'Cairo', sans-serif"><strong>اسم الجهاز :
                                                {{ $devices->title }}</strong></h5><br>
                                        <h5 style="font-family: 'Cairo', sans-serif"><strong> فترة الضمان :
                                                {{ $devices->warranty }}</strong></h5><br>

                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-3 invoice-col">
                                    <address>
                                        <strong></strong><br>
                                        <h5 style="font-family: 'Cairo', sans-serif"><strong>نوع الجهاز :
                                                <td>
                                                    <span>
                                                        @if ($devices->deviceTypes == '1')
                                                            جهاز طبي
                                                        @elseif($devices->deviceTypes == '2')
                                                            تكنولوجيا المعلومات
                                                        @elseif($devices->deviceTypes == '3')
                                                            هندسة وصيانة
                                                        @elseif($devices->deviceTypes == 'divorced')
                                                            مطلق
                                                        @endif
                                                    </span>
                                                </td>
                                            </strong></h5><br>
                                        <h5 style="font-family: 'Cairo', sans-serif"><strong>الشركة المصنعة :
                                                {{ $devices->manufacturer }}</strong></h5><br>
                                        <h5 style="font-family: 'Cairo', sans-serif"><strong> الشركة الموردة :
                                                {{ $devices->supplier }}</strong></h5><br>
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-3 invoice-col">
                                    <strong></strong><br>
                                    <h5 style="font-family: 'Cairo', sans-serif"><strong>موديل الجهاز :
                                            {{ $devices->model }} </strong></h5><br>
                                    <h5 style="font-family: 'Cairo', sans-serif"><strong>السيريال نمبر:
                                            {{ $devices->sn }}</strong></h5><br>
                                    <br>
                                    </div>

                                <div class="col-sm-12 invoice-col">
                                    <h5 style="font-family: 'Cairo', sans-serif"><strong>ملاحظات: </strong></h5><br>
                                    <h5 style="font-family: 'Cairo', sans-serif"><strong> </strong></h5><br>
                                    <br>

                                    <div class="row no-print col-md-12 text-center table-responsive p-20">
                                        <div class="col-12">
                                            <a class="btn btn-primary btn-outline backForm btn-lg "
                                                href="{{ route('admin.DevicesIt') }}" type="button">العودة الى قائمة
                                                الرئيسية
                                            </a>
                                        </div>
                                    </div>

                                </div>

                                <!-- /.col -->
                            </div>
                        </div>

                        @include('admin.device_It_Admin.form.device_movements.deviceMovement')

                        @include('admin.device_It_Admin.form.device_attachment.deviceattachment')
                        
                        @include('admin.device_It_Admin.form.accessory_medical.accessorymedical')
                        
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
{{-- <script type="text/javascript">
    function performStore() {

        let formData = new FormData();
        formData.append('device_id', document.getElementById('device_id').value);
        formData.append('file_name', document.getElementById('file_name').files[0]);

        store('/admin/Attachment', formData);
    }
</script> --}}

{{-- <script>
    function performDestroy(id, ref) {
        confirmDestroy('/admin/Attachment/' + id, ref);

    }
</script> --}}



<script type="text/javascript">
    function performStore() {

        let formData = new FormData();
        formData.append('title', document.getElementById('title').value);
        formData.append('sn', document.getElementById('sn').value);
        // formData.append('image', document.getElementById('image').value);
        formData.append('description', document.getElementById('description').value);
        // formData.append('active', document.getElementById('active').value);
        formData.append('device_id', document.getElementById('device').value);

        store('/admin/Accessory', formData);

    }
</script>


@endsection
