@extends('layouts.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@section('title')
    أنشاء تذكرة
@stop
@endsection
@section('PageTitle')
<!-- breadcrumb -->
@section('PageTitle2')
    أنشاء تذكرة
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <form>
                    <h4 style="font-family: 'Cairo', sans-serif"> أنشاء تذكرة جديدة</h4>
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
                <h5 class="card-title" style="font-family: 'Cairo', sans-serif">معلومات الأتصال</h5>
                <form>
                    <div class="row">

                        <div class="col-md-4 mb-30">
                            <div class="col">
                                <label for="author_name ">أسم المرسل</label>
                                <input type="text" name="author_name" class="form-control" id="author_name"
                                    placeholder="يرجي ادخال اسم المرسل">
                            </div>
                        </div>

                        <div class="col-md-4 mb-30">
                            <div class="col">
                                <label for="author_email ">البريد الاكتروني</label>
                                <input type="email" name="author_email" class="form-control" id="author_email"
                                    placeholder=" يرجي ادخل البريد الاكتروني" data-max="6" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-4 mb-30">
                            <div class="col">
                                <label for="mobile" class="mr-sm-2">رقم الجوال</label>
                                <input type="text" name="mobile" class="form-control" id="mobile"
                                    placeholder="يرجي أدخال رقم الجوال">
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
                <h5 class="card-title" style="font-family: 'Cairo', sans-serif">معلومات التذكرة</h5>
                <form>
                    <div class="row">
                        <div class="col-sm-4">
                            <!-- select -->
                            <div class="form-group">
                                <label> نوع طلب الصيانة</label>
                                <select class="custom-select" id="deviceTypes">
                                    <option value=""> اختارح نوع الطلب</option>
                                    <option value="1"> جهاز طبي</option>
                                    <option value="2">تكنولوجيا المعلومات</option>
                                    <option value="3">هندسة وصيانة</option>
                                </select>
                            </div>
                        </div>
                        {{-- <div class="col-md-4 mb-30">
                        <div class="col">
                            <label for="author_name ">أسم المرسل</label>
                            <input type="text" name="author_name" class="form-control" id="author_name"
                                placeholder="يرجي ادخال اسم المرسل">
                        </div>
                    </div> 

                    <div class="col-md-4 mb-30">
                        <div class="col">
                            <label for="author_email ">البريد الاكتروني</label>
                            <input type="email" name="author_email" class="form-control" id="author_email"
                             placeholder=" يرجي ادخل البريد الاكتروني" data-max="6"  required>
                        </div>
                    </div>  --}}
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
                                <label> أسم القسم</label>
                                <select class="custom-select" id="departments" style="width: 100%;">
                                    <option value="-1">أختار القسم</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3 mb-30">
                            <div class="col">
                                <label>أسم الوحدة</label>
                                <select class="custom-select" id="subdepartments" name="subdepartments"
                                    style="width: 100%;" class="custom-select">
                                    <option value="">يرجي أختيار اسم الوحدة</option>
                                    {{-- @foreach ($subdepartments as $subdepartment)
                                <option value="{{$subdepartment->id}}">{{$subdepartment->title}}</option>
                                @endforeach --}}
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="date ">التاريخ</label>
                                <input type="date" name="date" class="form-control" id="date"
                                    placeholder="يرجي تجديد التاريخ" data-max="6" required>
                            </div>
                        </div>

                        {{-- <div class="col-md-3 mb-30">
                        <div class="col">
                            <label>أسم الجهاز</label>
                            <select class="custom-select" id="devices" name="devices" style="width: 100%;" data-max="6">
                                <option value="">أختار اسم الجهاز</option>
                                @foreach ($devices as $device)
                                <option value="{{$device->id}}">{{$device->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}

                    </div>

                    <div class="row">

                        <div class="col-md-3 mb-30">
                            <div class="col">
                                <label for="sn" class="mr-sm-2">SN</label>
                                <input type="text" name="sn" class="form-control" id="sn"
                                    placeholder="ادخل SN">
                            </div>
                        </div>

                        {{-- <div class="col-md-3">
                        <div class="col">
                            <label>مديل الجهاز</label>
                            <select class="custom-select" id="model"  name="model" style="width: 100%;" data-max="6">
                                <option value=""></option>
                                @foreach ($devices as $device)
                                <option value="{{$device->id}}">{{$device->model}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}

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
                                <label for="title">أسم الجهاز :</label>
                                <input type="text" name="title" class="form-control" id="title"
                                    placeholder="">
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="model"> طراز الجهاز:</label>
                                <input type="text" name="model" class="form-control" id="model"
                                    placeholder="">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="room ">أسم الغرفة</label>
                                <input type="text" name="room" class="form-control" id="room"
                                    placeholder="" data-max="6" required>
                            </div>
                        </div>

                        {{-- <div class="col-md-4 mb-30">
                        <div class="col">
                            <label for="mobile" class="mr-sm-2">رقم الجوال</label>
                            <input type="text" name="mobile" class="form-control" id="mobile"
                            placeholder="ادخل SN">
                        </div>
                    </div>  --}}

                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <h5 class="card-title" style="font-family: 'Cairo', sans-serif">وصف المشكلة </h5>
                <form>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="col">
                                <label for="title ">الموضوع</label>
                                <input type="text" name="title" class="form-control" id="title"
                                    placeholder="ادخال عنوان للمشكلة" data-max="6" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-30">
                            <div class="col">
                                <label for="content">وصف المشكلة</label>
                                <textarea class="form-control" style="resize: none;" type="text" id="content" name="content" rows="4"
                                    placeholder="وصف المشكلة" cols="50"></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="modal-footer">
                        <button type="button" onclick="performStore()" class="btn btn-primary">أنشاء تذكرة</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- row closed -->
@endsection
@section('js')
<link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
<script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>

<script>
    $('#subdepartments').attr('disabled', true);

    $('#departments').on('change', function() {

        $('#subdepartments').attr('disabled', this.value == -1);

        if (this.value != -1) {
            // alert (this.value);
            getSubdepartments(this.value);

            // console.log(getSubdepartments);

        }

        function getSubdepartments(departmentId) {

            // axios.get(`/admin/departments/${departmentId}`)

            axios.get(`/admin/departments/${departmentId}`)


                .then(function(response) {
                    console.log(response);
                    if (response.data.subDepartment.length != 0) {
                        $('#subdepartments').empty();
                        $.each(response.data.subDepartment, function(i, item) {
                            $('#subdepartments').append(new Option(item['title'], item['id']))
                        });
                    } else {
                        $('#subdepartments').attr('disabled', true);
                    }
                })

        }
    })
</script>

<script>
    function performStore() {
        let data = {
            // tiket_no: document.getElementById('tiket_no').value,
            title: document.getElementById('title').value,
            content: document.getElementById('content').value,
            author_name: document.getElementById('author_name').value,
            author_email: document.getElementById('author_email').value,
            date: document.getElementById('date').value,
            mobile: document.getElementById('mobile').value,
            model: document.getElementById('model').value,
            sn: document.getElementById('sn').value,
            room: document.getElementById('room').value,
            // description: document.getElementById('image').value,devices
            deviceTypes: document.getElementById('deviceTypes').value,
            // device_id: document.getElementById('devices').value,
            department_id: document.getElementById('departments').value,
            sub_department_id: document.getElementById('subdepartments').value,
            // active: document.getElementById('active').checked,
        };

        store('/user/maintenances_It/store/', data);
    }
</script>

<script>
    $('#model').attr('disabled', true);
    $('#room').attr('disabled', true);
    $('#title').attr('disabled', true);
    $(document).ready(function() {
        let sn = document.getElementById('sn');
        sn.addEventListener('change', updateValue);

        function updateValue(e) {
            e.preventDefault();
            if (sn.value.length === 9) {
                $.ajax({
                    url: "{{ URL::to('admin/getdetails') }}/" + sn.value,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        title = document.getElementById('title');
                        title.value = data[0].title;

                        model = document.getElementById('model');
                        model.value = data[0].model;

                        room = document.getElementById('room');
                        room.value = data[0].room;

                        //    family_name =document.getElementById('family_name');   
                        //    family_name.value=data[0].family_name;

                        //     mobile =document.getElementById('mobile');   
                        //    mobile.value=data[0].mobile;

                        //    address =document.getElementById('address');   
                        //    address.value=data[0].address;

                        // $.each(data, function(key, value) {
                        //     first_name =document.getElementById('first_name').append('<option value="' +
                        //         value + '">' + value + '</option>'); 

                        // });                    
                    },
                });

            } else {
                console.log('AJAX load did not work');
            }
        }

    });
</script>

@endsection
