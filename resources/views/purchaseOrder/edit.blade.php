@extends('layouts.master')
@section('css')

@section('title')
    أضافة جهاز
@stop
@endsection
@section('PageTitle')
<!-- breadcrumb -->
@section('PageTitle2')
    أضافة جهاز

@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <!-- form start -->
                <form id="create_form" autocomplete="off">
                    @csrf
                    <div class="card-body">
                        <form>
                            <table class="col-md-4">
                                <h4 class="col mr-sm-2 card-title">بيانات الجهاز</h4>
                            </table>

                            <div class="row">
                                <div class="col-md-4 mb-30">
                                    <div class="col">
                                        <label for="codeDevices" class="mr-sm-2">باركود الجهاز</label>
                                        <input type="text" name="codeDevices" class="form-control" id="codeDevices"
                                            placeholder="ادخل باركود الجهاز" value="{{ $devices->codeDevices }}">
                                    </div>
                                </div>

                                {{-- <div class="col-md-4">
                                    <div class="col">
                                        <label for="deviceTypes" class="mr-sm-2">نوع الجهاز</label>
                                        <input type="text" name="deviceTypes" class="form-control" id="deviceTypes"
                                        placeholder="ادخل نوع الجهاز">
                                    </div>
                                </div> --}}

                                <div class="col-sm-3">
                                    <!-- select -->
                                    <div class="form-group">
                                        <label> نوع الجهاز</label>
                                        <select class="custom-select" id="deviceTypes">
                                            <option value=""> اختارح نوع الجهاز</option>
                                            <option value="1"
                                                {{ $devices->deviceTypes == '1' ? 'selected' : '' }}> جهاز طبي</option>
                                            <option value="2"
                                                {{ $devices->deviceTypes == '2' ? 'selected' : '' }}>تكنولوجيا
                                                المعلومات</option>
                                            <option value="3"
                                                {{ $devices->deviceTypes == '3' ? 'selected' : '' }}>هندسة وصيانة
                                            </option>>
                                        </select>
                                    </div>
                                </div>



                                <div class="col-md-4">
                                    <div class="col">
                                        <label for="title" class="mr-sm-2">أسم الجهاز </label>
                                        <input type="text" name="title" class="form-control" id="title"
                                            placeholder="ادخل اسم الجهاز" value="{{ $devices->title }}">
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-4 mb-30">
                                    <div class="col">
                                        <label for="sn" class="mr-sm-2">SN</label>
                                        <input type="text" name="sn" class="form-control" id="sn"
                                            placeholder="ادخل SN" value="{{ $devices->sn }}">
                                    </div>
                                </div>

                                {{-- <div class="col-md-4">
                                    <div class="col">
                                        <label for="department_id" class="mr-sm-2">أسم القسم </label>
                                        <input type="text" name="department_id" class="form-control" id="department_id"
                                        placeholder="ادخل اسم القسم">
                                    </div>
                                </div> --}}

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label> القسم</label>
                                        {{-- <table class="card-title ">
                                                 <h5 class=" card-header  mb-0 my-auto">القسم :</h5>
                                        </table> --}}
                                        <select class="custom-select" id="departments">
                                            <option value="">أختار القسم</option>
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}"
                                                    {{ $department->id == $devices->department->id ? 'selected' : '' }}>
                                                    {{ $department->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- <div class="col-md-4">
                                    <div class="col">
                                        <label for="sub_department_id" class="mr-sm-2">أسم الوحدة </label>
                                        <input type="text" name="sub_department_id" class="form-control" id="sub_department_id"
                                        placeholder="ادخل اسم الوحدة">
                                    </div>
                                </div> --}}

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label> القسم</label>
                                        {{-- <table class="card-title ">
                                                 <h5 class=" card-header  mb-0 my-auto">القسم :</h5>
                                        </table> --}}
                                        <select class="custom-select" id="subdepartments" name="subdepartments"
                                            style="width: 100%;">
                                            <option value="">أختار القسم</option>
                                            @foreach ($subdepartments as $subdepartment)
                                                <option value="{{ $subdepartment->id }}"
                                                    {{ $subdepartment->id == $devices->subdepartment->id ? 'selected' : '' }}>
                                                    {{ $subdepartment->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>

                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div>
                    {{-- <table class="card-title ">
                        <h4 class="card-title">معلومات الشركة المصنعة</h4>
                    </table> --}}
                </div>
                <!-- form start -->
                <form id="create_form" autocomplete="off">
                    <div class="card-body">
                        <form>
                            <table class="col-md-4">
                                <h4 class="col mr-sm-2 card-title">معلومات الشركة المصنعة</h4>
                            </table>
                            <div class="row">

                                <div class="col-md-3 mb-30">
                                    <div class="col">
                                        <label for="manufacturer" class="mr-sm-2">الشركة المصنعة</label>
                                        <input type="text" name="manufacturer" class="form-control" id="manufacturer"
                                            placeholder="ادخل اسم الشركة المصنعة" value="{{ $devices->manufacturer }}">
                                    </div>
                                </div>

                                <div class="col-md-3 mb-30">
                                    <div class="col">
                                        <label for="model" class="mr-sm-2">موديل الجهاز</label>
                                        <input type="text" name="model" class="form-control" id="model"
                                            placeholder="ادخل موديل الجهاز" value="{{ $devices->model }}">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="col">
                                        <label for="supplier" class="mr-sm-2">الشركة الموردة</label>
                                        <input type="text" name="supplier" class="form-control" id="supplier"
                                            placeholder="ادخل اسم الشركة الموردة" value="{{ $devices->supplier }}">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="col">
                                        <label for="warranty" class="mr-sm-2">فترة الضمانة</label>
                                        <input type="text" name="warranty" class="form-control" id="warranty"
                                            placeholder="ادخل فترة الضمان" value="{{ $devices->warranty }}">
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-12 mb-30">
                                    <div class="col">
                                        <label for="description">وصف القسم</label>
                                        <textarea class="form-control" style="resize: none;" type="text" id="description" name="description"
                                            rows="4" placeholder="وصف القسم" cols="50">{{ $devices->description }}</textarea>
                                    </div>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" name="active"class="form-check-input" id="active"
                                        @if ($devices->active) checked @endif>
                                    <label class="form-check-label" for="active">تفعيل</label>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="modal-footer">
                                <button type="button" onclick="performUpdate({{ $devices->id }})"
                                    class="btn btn-primary">تحديث البيانات</button>
                            </div>
                        </form>
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
    function performUpdate(id) {
        let data = {
            codeDevices: document.getElementById('codeDevices').value,
            title: document.getElementById('title').value,
            // title_en: document.getElementById('title_en').value,
            deviceTypes: document.getElementById('deviceTypes').value,
            manufacturer: document.getElementById('manufacturer').value,
            model: document.getElementById('model').value,
            sn: document.getElementById('sn').value,
            supplier: document.getElementById('supplier').value,
            warranty: document.getElementById('warranty').value,
            // description: document.getElementById('image').value,
            description: document.getElementById('description').value,
            // Created_by: document.getElementById('Created_by').value,
            department_id: document.getElementById('departments').value,
            sub_department_id: document.getElementById('subdepartments').value,
            active: document.getElementById('active').checked,
        };

        let redirectUrl = '/devices'
        update('/devices/' + id, data, redirectUrl);
    }
</script>
@endsection
