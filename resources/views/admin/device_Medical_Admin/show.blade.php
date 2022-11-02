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
                              <a class="nav-link" id="portfolio-07-tab" data-toggle="tab" href="#portfolio-07" role="tab" aria-controls="portfolio-07" aria-selected="false"><i class="fa fa-picture-o"></i> عمليات الصيانة </a>
                            </li>
                        {{-- <li class="nav-item">
                              <a class="nav-link" id="contact-07-tab" data-toggle="tab" href="#contact-07" role="tab" aria-controls="contact-07" aria-selected="false"><i class="fa fa-check-square-o"></i> Contact </a>
                            </li> --}}
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

                                {{-- <div class="col-sm-3 invoice-col">
                                    <h5 style="font-family: 'Cairo', sans-serif"><strong> الشركة الموردة :
                                            {{ $devices->supplier }}</strong></h5><br>

                                    <br>
                                </div> --}}

                                {{-- <div class="col-sm-3 invoice-col">

                                    <h5 style="font-family: 'Cairo', sans-serif"><strong> فترة الضمان :
                                            {{ $devices->warranty }}</strong></h5><br>
                                    <br>
                                </div> --}}


                                <div class="col-sm-12 invoice-col">
                                    <h5 style="font-family: 'Cairo', sans-serif"><strong>ملاحظات: </strong></h5><br>
                                    <h5 style="font-family: 'Cairo', sans-serif"><strong> </strong></h5><br>
                                    <br>

                                    <div class="row no-print col-md-12 text-center table-responsive p-20">
                                        <div class="col-12">
                                            <a class="btn btn-primary btn-outline backForm btn-lg " href="{{ route('admin.DevicesMedical') }}"
                                                type="button">العودة الى قائمة الرئيسية
                                            </a>
                                        </div>   
                                    </div>

                                </div>

                                <!-- /.col -->
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile-07" role="tabpanel" aria-labelledby="profile-07-tab">

                            @foreach ($deviceMovements as $deviceMovement)
                                <div class="card mt-3">
                                    <h5 class="card-header" style="font-family: 'Cairo', sans-serif">
                                        {{ $deviceMovement->title }}

                                        <span class="badge rounded-pill bg-warning text-dark">
                                            {{ $deviceMovement->created_by }}
                                        </span>

                                    </h5>

                                    <div class="card-body">
                                        <div class="card-text">
                                            <div class="float-start">
                                                {{ $deviceMovement->body }}
                                            </div>
                                            <br>

                                            <small>أخرتحديث - {{ $deviceMovement->updated_at->diffForHumans() }}
                                            </small>

                                            {{-- <div class="float-end ">
                                                <a href="#" class="btn btn-success left ">
                                                 تعديل الرد</i>
                                                </a>
                                
                                
                                                <a href="#" onclick="performDestroy({{ $deviceMovement->id }},this)  " class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i>
                                                    حذف الرد</a>
                                
                                
                                            </div> --}}

                                            <div class="clearfix"></div>
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        </div>
                        <div class="tab-pane fade" id="portfolio-07" role="tabpanel" aria-labelledby="portfolio-07-tab">
                            <p>جاري العمل على تجهيز هذا القسم</p>
                        </div>
                        <div class="tab-pane fade" id="contact-07" role="tabpanel" aria-labelledby="contact-07-tab">
                            <p>The other virtues practice in succession by Franklin were silence, order, resolution,
                                frugality, industry, sincerity, Justice, moderation, cleanliness, tranquility, chastity
                                and humility. For the summary order he followed a little scheme of employing his time
                                each day. From five to seven each morning he spent in bodily personal attention, saying
                                a short prayer, thinking over the day’s business and resolutions.</p>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
