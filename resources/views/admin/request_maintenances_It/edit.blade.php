
@extends('layouts.master')
@section('css')

@section('title')
تعديل طلب الصيانة
@stop
@endsection
@section('PageTitle')
<!-- breadcrumb -->
@section('PageTitle2')
تعديل طلب الصيانة
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
                    <h4 style="font-family: 'Cairo', sans-serif"> تعديل طلب الصيانة </h4>
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
          <form >
                <div class="row">

                    <div class="col-sm-4">
                        <!-- select -->
                        <div class="form-group">
                            <label> نوع طلب الصيانة</label>
                          <select class="custom-select"   id="deviceTypes">
                            <option value=""> اختارح نوع الطلب</option>
                            <option value="1" {{ $maintenancerequest->deviceTypes == "1"  ? 'selected' : ''}}> جهاز طبي</option>
                            <option value="2" {{ $maintenancerequest->deviceTypes == "2"  ? 'selected' : ''}}>تكنولوجيا المعلومات</option>
                            <option value="3" {{ $maintenancerequest->deviceTypes == "3"  ? 'selected' : ''}}>هندسة وصيانة</option>
                          </select>
                        </div>
                      </div>
                    <div class="col-md-4 mb-30">
                        <div class="col">
                            <label for="author_name ">أسم المرسل</label>
                            <input type="text" name="author_name" class="form-control" id="author_name"
                                placeholder="يرجي ادخال اسم المرسل" value="{{$maintenancerequest->author_name}}" >
                        </div>
                    </div> 

                    <div class="col-md-4 mb-30">
                        <div class="col">
                            <label for="author_email ">البريد الاكتروني</label>
                            <input type="email" name="author_email" class="form-control" id="author_email"
                             placeholder=" يرجي ادخل البريد الاكتروني" data-max="6"  required value="{{$maintenancerequest->author_email}}">
                        </div>
                    </div> 
                </div>

                <div class="row">
                
                    {{-- <div class="col-md-5 mb-30">
                        <div class="col">
                            <label for="author_name ">البريد الاكتروني</label>
                            <input type="text" name="author_name" class="form-control" id="author_name"
                             placeholder=" يرجي ادخل البريد الاكتروني" data-max="6"  required>
                        </div>
                    </div>  --}}

                    {{-- <div class="col-md-5">
                        <div class="form-group">
                            <label>القسم الرئيسي</label>
                            <select class="custom-select" id="departments" name="departments" style="width: 100%;">
                                <option value="">يرجي أختيار اسم القسم</option>
                                @foreach ($departments as $department)
                                <option value="{{$department->id}}">{{$department->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}

                </div>

                <div class="row">

                    <div class="col-md-3">
                        <div class="col">
                            <label> القسم</label>
                            <select class="custom-select" id="departments" style="width: 100%;">
                                <option value="">أختار القسم</option>
                                @foreach ($departments as $department)
                                <option value="{{$department->id}}" {{ $department->id == $maintenancerequest->department->id ? 'selected' : '' }}>{{$department->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                
                    <div class="col-md-3 mb-30">
                        <div class="col">
                            <label>أسم الوحدة</label>
                            {{-- <select class="custom-select" id="subdepartments" name="subdepartments" style="width: 100%;" class="custom-select" >
                                <option value="">يرجي أختيار اسم الوحدة</option>
                                @foreach ($subdepartments as $subdepartment)
                                <option value="{{$subdepartment->id}}" {{ $subdepartment->id == $maintenancerequest->subdepartment->id ? 'selected' : '' }}>{{$subdepartment->title}}</option>
                                @endforeach
                            </select> --}}
                            <input type="text" name="subdepartments" class="form-control" id="subdepartments"
                             placeholder="{{trans('maintenance_trans.enter_email')}}" data-max="6"  required value="{{$maintenancerequest->sub_department_id}}">
                        </div>
                    </div>

                    <div class="col-md-3 mb-30">
                        <div class="col">
                            <label>أسم الجهاز</label>
                            {{-- <select class="custom-select" id="devices" name="devices" style="width: 100%;" data-max="6">
                                <option value="">أختار اسم الجهاز</option>
                                @foreach ($devices as $device)
                                <option value="{{$device->id}}" {{ $device->id == $maintenancerequest->device->id ? 'selected' : '' }}>{{$device->title}}</option>
                                @endforeach
                            </select> --}}
                            <input type="text" name="device_id" class="form-control" id="device_id"
                             placeholder="{{trans('maintenance_trans.enter_email')}}" data-max="6"  required value="{{$maintenancerequest->title}}">
                        </div>
                    </div>
                    

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="date ">{{trans('maintenance_trans.date')}}</label>
                            <input type="date" name="date" class="form-control" id="date"
                             placeholder="{{trans('maintenance_trans.enter_email')}}" data-max="6"  required value="{{$maintenancerequest->date}}">
                        </div>
                    </div>
                                                   
                </div>

                <div class="row">
                    

                    <div class="col-md-3">
                        <div class="col">
                            <label>مديل الجهاز</label>
                            {{-- <select class="custom-select" id="model"  name="model" style="width: 100%;" data-max="6">
                                <option value=""></option>
                                @foreach ($devices as $device)
                                <option value="{{$device->id}}" {{ $device->id == $maintenancerequest->device->id ? 'selected' : '' }}>{{$device->model}}</option>
                                @endforeach
                            </select> --}}
                            <input type="text" name="model" class="form-control" id="model"
                             placeholder="{{trans('maintenance_trans.enter_email')}}" data-max="6"  required value="{{$maintenancerequest->model}}">
                        </div>
                    </div>

                    {{-- <div class="col-md-3">
                        <div class="form-group">
                            <label> SN </label>
                            <select class="custom-select" id="sn" name="sn" style="width: 100%;">
                                <option value=""></option>
                                @foreach ($departments as $department)
                                <option value="{{$department->id}}">{{$department->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="room ">أسم الغرفة</label>
                            <input type="text" name="room" class="form-control" id="room"
                            placeholder="يرجي أدخال رقم الغرفة" data-max="6"  required value="{{$maintenancerequest->room}}">
                        </div>
                    </div>

                    <div class="col-md-4 mb-30">
                        <div class="col">
                            <label for="sn" class="mr-sm-2">SN</label>
                            <input type="text" name="sn" class="form-control" id="sn"
                            placeholder="ادخل SN" value="{{$maintenancerequest->sn}}">
                        </div>
                    </div> 

                    <div class="col-md-4 mb-30">
                        <div class="col">
                            <label for="mobile" class="mr-sm-2">رقم الجوال</label>
                            <input type="text" name="mobile" class="form-control" id="mobile"
                            placeholder="ادخل SN" value="{{$maintenancerequest->mobile}}">
                        </div>
                    </div> 
                </div>

                {{-- <div class="form-check">
                    <input type="checkbox" name="status"class="form-check-input" id="status"
                    @if($maintenancerequest->status) checked @endif>
                    <label class="form-check-label" for="status">تفعيل</label>
                </div> --}}

                

                <div class="row">

                    <div class="col-sm-4">
                        <!-- select -->
                        <div class="form-group">
                            <label> حالة التذكرة</label>
                          <select class="custom-select"   id="status">
                            <option value=""> اختارح نوع الطلب</option>
                            <option value="1" {{ $maintenancerequest->status == "Todo"  ? 'selected' : ''}}>مفتوحة</option>
                            <option value="2" {{ $maintenancerequest->status == "Done"  ? 'selected' : ''}}>مغلقة</option>
                          </select>
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
          <h5 class="card-title">وصف المشكلة </h5>
          <form>
            <div class="row">
                <div class="col-md-3">
                    <div class="col">
                        <label for="title ">الموضوع</label>
                        <input type="text" name="title" class="form-control" id="title"
                         placeholder="ادخال عنوان للمشكلة" data-max="6"  required value="{{$maintenancerequest->title}}">
                    </div>
                </div>
            </div>

            <div class="row">
                    <div class="col-md-12 mb-30">
                        <div class="col">
                            <label for="content">وصف المشكلة</label>
                            <textarea class="form-control" style="resize: none;"  type="text" id="content" name="content" rows="4"
                                placeholder="وصف المشكلة" cols="50">{{$maintenancerequest->content}}</textarea>
                        </div>
                    </div>                
            </div>                    
            <!-- /.card-body -->
            <div class="modal-footer">
                <button type="button" onclick="performUpdate({{$maintenancerequest->id}})" class="btn btn-primary">تعديل تذكرة</button>
            </div>
        </form> 
        </div>
      </div>   
    </div> 
</div>
<!-- row closed -->
@endsection
@section('js')

<script>

    function performUpdate(id){
        let data = {
            // tiket_no: document.getElementById('tiket_no').value,
            title: document.getElementById('title').value,
            content: document.getElementById('content').value,
            author_name	: document.getElementById('author_name').value,
            author_email: document.getElementById('author_email').value,
            date: document.getElementById('date').value,
            mobile: document.getElementById('mobile').value,
            model: document.getElementById('model').value,
            sn: document.getElementById('sn').value,
            room: document.getElementById('room').value,
            // description: document.getElementById('image').value,devices
            deviceTypes: document.getElementById('deviceTypes').value,
            // device_id: document.getElementById('device_id').value,
            department_id: document.getElementById('departments').value,
            sub_department_id: document.getElementById('subdepartments').value,
            status: document.getElementById('status').value,
            // active: document.getElementById('active').checked,
        };
            
        let redirectUrl = '/Request/deviceit'
        update('/admin/xxxxxxx/update/'+id,data);
    }
</script>
@endsection


