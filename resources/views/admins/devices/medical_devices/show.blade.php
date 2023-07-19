@extends('layouts.master')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">


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
                            <a class="nav-link active show" id="home-05-tab" data-toggle="tab" href="#home-05"
                                role="tab" aria-controls="home-05" aria-selected="true"> <i class="fa fa-home"></i>
                                تفصيل الجهاز
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile6-06-tab" data-toggle="tab" href="#profile-06" role="tab"
                                aria-controls="profile-06" aria-selected="false">تنقلات الجهاز</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="portfolio7-07-tab" data-toggle="tab" href="#portfolio-07"
                                role="tab" aria-controls="portfolio-07" aria-selected="false"><i
                                    class="fa fa-picture-o"></i> مرفقات الجهاز </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-08-tab" data-toggle="tab" href="#contact-08" role="tab"
                                aria-controls="contact-08" aria-selected="false"><i class="fa fa-check-square-o"></i>
                                ملحقات الجهاز </a>
                        </li>
                    </ul>
                    <h5 class="card-title"> </h5>

                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="home-05" role="tabpanel"
                            aria-labelledby="home-05-tab">

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

                        @include('admins.devices.medical_devices.form.device_movements.deviceMovement')

                        @include('admins.devices.medical_devices.form.device_attachment.deviceattachment')

                        @include('admins.devices.medical_devices.form.accessory_medical.accessorymedical')

                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

<script>

    function performDestroy(id, ref) {
        confirmDestroy('/admin/Accessory_Medi/destroy/' + id, ref);
    }
</script>



@endsection
