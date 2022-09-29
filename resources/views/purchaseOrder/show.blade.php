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
                        {{-- <li class="nav-item">
                              <a class="nav-link" id="portfolio-07-tab" data-toggle="tab" href="#portfolio-07" role="tab" aria-controls="portfolio-07" aria-selected="false"><i class="fa fa-picture-o"></i> Portfolio </a>
                            </li> --}}
                        {{-- <li class="nav-item">
                              <a class="nav-link" id="contact-07-tab" data-toggle="tab" href="#contact-07" role="tab" aria-controls="contact-07" aria-selected="false"><i class="fa fa-check-square-o"></i> Contact </a>
                            </li> --}}
                    </ul>
                    <h5 class="card-title"> </h5>

                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="home-07" role="tabpanel"
                            aria-labelledby="home-07-tab">

                            <!-- -->
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    <address>
                                        <strong></strong><br>
                                        <h5><strong>بار كود الجهاز : {{ $devices->codeDevices }}</strong></h5><br>
                                        <h5><strong>اسم الجهاز : {{ $devices->title }}</strong></h5><br>
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    <address>
                                        <strong></strong><br>
                                        <h5><strong>نوع الجهاز :
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
                                        <h5><strong>الشركة المصنعة : {{ $devices->manufacturer }}</strong></h5><br>
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    <strong></strong><br>
                                    <h5><strong>موديل الجهاز : {{ $devices->model }} </strong></h5><br>
                                    <h5><strong>SN: {{ $devices->sn }}</strong></h5><br>
                                    <br>
                                </div>

                                <div class="col-sm-4 invoice-col">
                                    <h5><strong> الشركة الموردة : {{ $devices->supplier }}</strong></h5><br>

                                    <br>
                                </div>

                                <div class="col-sm-4 invoice-col">

                                    <h5><strong> فترة الضمان : {{ $devices->warranty }}</strong></h5><br>
                                    <br>
                                </div>


                                <div class="col-sm-12 invoice-col">
                                    <h5><strong>ملاحظات: </strong></h5><br>
                                    <h5><strong> </strong></h5><br>
                                    <br>
                                    {{-- <b>Order ID:</b> 4F3S8J<br>
              <b>Payment Due:</b> 2/22/2014<br>
              <b>Account:</b> 968-34567 --}}

                                    {{-- <div  class="col-md-12 text-center card-footer">
                  <a class="btn btn-primary btn-outline backForm btn-lg " href="{{ route('patients.index') }}"
                  type="button">العودة الى قائمة المرضى
                      </a> 

              </div> --}}
                                    <div class="row no-print col-md-12 text-center table-responsive p-20">
                                        <div class="col-12">
                                            {{-- <a href="{{ route('patients.show',$patients->id) }}" rel="noopener" target="_blank" class="btn btn-info btn-outline btn-lg">
                    <i class="fas fa-print"></i> طباعة الملف</a> --}}
                                            {{-- <button class="btn btn-danger  float-left mt-3 mr-2" id="print_Button" onclick="printDiv()"> 
                      <i class="mdi mdi-printer ml-1"></i>طباعة</button> --}}


                                            <a class="btn btn-primary btn-outline backForm btn-lg " href="#"
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
                                    <h5 class="card-header">
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
                            <p>Benjamin Franklin, inventor, statesman, writer, publisher and economist relates in his
                                autobiography that early in his life he decided to focus on arriving at moral
                                perfection. He made a list of 13 virtues, assigning a page to each. Under each virtue he
                                wrote a summary that gave it fuller meaning. Then he practiced each one for a certain
                                length of time. To make these virtues a habit, Franklin can up with a method to grade
                                himself on his daily actions.</p>
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
