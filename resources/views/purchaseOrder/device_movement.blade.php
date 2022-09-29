@extends('layouts.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@section('title')
    حركة الجهاز
@stop
@endsection
@section('PageTitle')
<!-- breadcrumb -->
@section('PageTitle2')
    حركة الجهاز
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <h5 class="card-title">أضافة تعليق </h5>
                <form>
                    <div class="row">
                        <input type="hidden" id="device_id" name="device_id" value="{{ $devices->id }}">
                        <div class="col-md-4">
                            <div class="col">
                                <label for="title" class="mr-sm-2"> عنوان الحركة </label>
                                <input type="text" name="title" class="form-control" id="title"
                                    placeholder="ادخل عنوان الحركة">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="col">
                                <label for="newLocation	" class="mr-sm-2">موقع الجهاز </label>
                                <input type="text" name="newLocation" class="form-control" id="newLocation"
                                    placeholder="ادخل موقع الجهاز ">
                            </div>
                        </div>

                        <div class="col-md-12 mb-30">
                            <div class="col">
                                <label for="body">أضافة تعليق</label>
                                <textarea class="form-control" style="resize: none;" type="text" id="body" name="body" rows="4"
                                    placeholder="أضافة تعليق" cols="50"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4 mb-30">
                            <!-- select -->
                            <div class="col">
                                <label> حالة التذكرة</label>
                                <select class="custom-select" id="new_status">
                                    <option value=""> اختارح نوع الطلب</option>
                                    <option value="1">مفتوحة</option>
                                    <option value="2">مغلقة</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="modal-footer">
                        <button type="button" onclick="performStore()" class="btn btn-primary">أضافة رد</button>
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
    function performStore() {
        let data = {
            title: document.getElementById('title').value,
            body: document.getElementById('body').value,
            device_id: document.getElementById('device_id').value,
            newLocation: document.getElementById('newLocation').value,
        };

        store('/devices/Device_Movements', data);
    }
</script>

@endsection
