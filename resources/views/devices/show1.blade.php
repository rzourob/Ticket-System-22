@extends('layouts.master')
@section('css')

@section('title')
    تفاصيل الجها
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle2')
    تفاصيل الجهاز
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->

<div class="row">   
    <div class="col-md-12 mb-30">     
      <div class="card card-statistics h-100"> 
        <div class="card-body">    
          <h5 class="card-title text-center">معلومات حول الجهاز</h5>
           <!-- -->
           <div class="row invoice-info text-left">
            <div class="col-sm-4 ">
            </div>
            <div class="col-sm-5">
            </div>
            <div class="col-sm-3 ">

              {{-- <img class="img-circle img-bordered-sm" height="250" with="150" src="{{Storage::url('public/patients/' . $familydetails->patient->image)}}"  alt="User profile picture"> --}}
              <img class="img-circle img-bordered-sm" height="200" with="80"   src="{{Storage::url('public/devices/' . $devices->image ?? '')}}" alt="User profile picture">
            </div>
        </div>
        <!-- -->
          

         
          <div class="row invoice-info">

            <div class="col-sm-4 invoice-col">
              <address>
                <strong></strong><br>
                <h5><strong>بار كود الجهاز  : {{ $devices->codeDevices }}</strong></h5><br>
                <h5><strong>اسم الجهاز : {{ $devices->title }}</strong></h5><br>
                
              </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <address>
                <strong></strong><br>
                <h5><strong>نوع الجهاز  : 
                    <td>
                                    <span >
                                        @if($devices->deviceTypes == "1")
                                        جهاز طبي
                                        @elseif($devices->deviceTypes == "2")
                                        تكنولوجيا المعلومات
                
                                        @elseif($devices->deviceTypes == "3")
                                        هندسة وصيانة
                
                                       @elseif($devices->deviceTypes == "divorced")
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
              <h5><strong>موديل الجهاز  : {{ $devices->model }} </strong></h5><br>
              <h5><strong>SN:  {{ $devices->sn }}</strong></h5><br>
              <br>
            </div>

            <div class="col-sm-4 invoice-col">
              <h5><strong> الشركة الموردة  :  {{ $devices->supplier }}</strong></h5><br>
              
              <br>
            </div>

            <div class="col-sm-4 invoice-col">

              <h5><strong> فترة الضمان  : {{ $devices->warranty }}</strong></h5><br>
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
      </div>   
    </div>
     
</div>

<!-- row closed -->
@endsection
@section('js')

@endsection
