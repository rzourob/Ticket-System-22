@extends('layouts.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@section('title')
أضافة حركة للجهاز
@stop
@endsection
@section('PageTitle')
<!-- breadcrumb -->
@section('PageTitle2')
أضافة حركة للجهاز
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<div class="row">
    <div class="col-md-12 ">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <form>
                    <h4 style="font-family: 'Cairo', sans-serif"> أضافة حركة للجهاز</h4>
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
                <h5 class="card-title" style="font-family: 'Cairo', sans-serif">أضافة حركة للجهاز</h5>
                <form>
                    <div class="row">
                        <input type="hidden" id="device_id" name="device_id" value="{{$deviceMovements->device->id }}">
                        <div class="col-sm-4 mb-30">
                            <!-- select -->
                            <div class="col">
                                <label> نوع الحركة</label>
                                <select class="custom-select" id="movement_type">
                                    <option value=""> اختارح نوع الحركة</option>
                                    <option value="1" {{ $deviceMovements->movement_type == "1"  ? 'selected' : ''}}>حركة داخل القسم</option>
                                    <option value="2" {{ $deviceMovements->movement_type == "2"  ? 'selected' : ''}}>حركة خارج القسم</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="col">
                                <label for="title" class="mr-sm-2"> عنوان الحركة </label>
                                <input type="text" name="title" class="form-control" id="title" value="{{ $deviceMovements->title }}"
                                    placeholder="ادخل عنوان الحركة">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="col">
                                <label for="newLocation	" class="mr-sm-2">موقع الجهاز </label>
                                <input type="text" name="newLocation" class="form-control" id="newLocation"  value="{{ $deviceMovements->newLocation }}"
                                    placeholder="ادخل موقع الجهاز ">
                            </div>
                        </div>

                        <div class="col-md-12 mb-30">
                            <div class="col">
                                <label for="body">أضافة تعليق</label>
                                <textarea class="form-control" style="resize: none;" type="text" id="body" name="body" rows="4"
                                    placeholder="أضافة تعليق" cols="50">{{ $deviceMovements->body }}</textarea>
                            </div>
                        </div>
                    </div>

                    
                    <!-- /.card-body -->
                    <div class="modal-footer">
                        <button type="button" onclick="performUpdate({{$deviceMovements->id}})" class="btn btn-primary">أضافة حركة</button>
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
    function performUpdate(id) {
        let data = {
            title: document.getElementById('title').value,
            body: document.getElementById('body').value,
            movement_type: document.getElementById('movement_type').value,
            device_id: document.getElementById('device_id').value,
            newLocation: document.getElementById('newLocation').value,
        };

        let redirectUrl = '/admin/devices_It'
            update('/admin/Movements_It/update/'+id,data,redirectUrl);
    }
</script>

@endsection
