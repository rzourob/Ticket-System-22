@extends('layouts.master')

@section('css')

@section('title')
    عرض الأجهزة
@stop
@endsection
<!-- breadcrumb -->
@section('PageTitle')
<div class="col-sm-6" >
    <h4 class="mb-0" style="font-family: 'Cairo', sans-serif">عرض الأجهزة </h4>
  </div>
<!-- breadcrumb -->

@section('PageTitle2')
عرض الأجهزة
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-2">
        <tbody>
            <tr>
                <td>
                    {{-- <a href="{{ route('devices.create') }}" class="btn btn-block btn-outline-success btn-lg">أضافة
                        جهاز</a> --}}
                </td>
            </tr>
        </tbody>
    </div>
</div>
<br>
{{-- <div class="card-body">
    <!-- Large modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">اضافة قسم</button> 
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <div class="modal-title"><div class="mb-10">
              <h2>أضافة قسم جديد</h2>
            </div>
            </div>
          </div>
          <div class="modal-body">

            <form id="create_form">
                @csrf

                <div class="row">
                            
                    <div class="col-md-6 mb-30">
                        <div class="col">
                            <label for="title_ar" class="mr-sm-2">أسم القسم</label>
                            <input type="text" name="title" class="form-control" id="title"
                            placeholder="ادخل اسم القسم باللغة العربية">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col">
                             <label for="title_en" class="mr-sm-2">أسم القسم</label>
                             <input type="text" name="title_en" class="form-control" id="title_en"
                               placeholder="ادخل اسم المدينة القسم الانجيليزية">
                        </div>
                    </div>  
                </div>

                <div class="row">
                    <div class="col-md-12 mb-30">
                        <div class="col">
                              <label for="description">وصف القسم</label>
                              <textarea class="form-control" style="resize: none;"  type="text" id="description" name="description" rows="4"
                               placeholder="وصف القسم" cols="50"></textarea>
                        </div>
                    </div>
               </div>

               <div class="form-check">
                    <input type="checkbox" name="active"class="form-check-input" id="active">
                         <label class="form-check-label" for="active">تفعيل</label>
                </div>

            <div class="modal-footer">
                <button type="button" onclick="performStore()" class="btn btn-primary">أنشاء قسم</button>
            </div> 

            </form>

          </div>

          <div class="modal-footer">
            <button type="button" onclick="performStore()" class="btn btn-primary">أنشاء قسم</button>
          </div>
        </div>
      </div>
    </div>
</div> --}}

<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <h5 class="card-title" style="font-family: 'Cairo', sans-serif">فلترة البيانات</h5>
                <form>
                    <div class="row">
                        <div class="col-sm-3 ">
                            <!-- select -->
                            <div class="form-group ">
                                <label> حالة القسم</label>
                                <select class="custom-select" id="departments">
                                    <option value="">أختار القسم</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3 ">
                            <!-- select -->
                            <div class="form-group ">
                                <label> حالة الوحدة</label>
                                <select class="custom-select" id="subdepartments">
                                    <option value="">يرجي أختيار اسم الوحدة</option>
                                    {{-- @foreach ($subdepartments as $subdepartment)
                                        <option value="{{ $subdepartment->id }}">{{ $subdepartment->title }}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3 ">
                            <!-- select -->
                            <div class="form-group ">
                                <label> نوع الجهاز </label>
                                <select class="custom-select" id="deviceTypes">
                                    <option value=""> اختارح نوع الطلب</option>
                                    <option value="1">أجهة طبية</option>
                                    <option value="2">أجهزة تكنولوجيا المعلومات</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group ">
                                <label>البحث حسب التاريخ</label>

                                <div class="input-group input-daterange" data-date="23/11/2018"
                                    data-date-format="mm/dd/yyyy">
                                    <input type="text" class="form-control range-from" name="fromDate"
                                        id="fromDate">
                                    <div class="input-group-addon">to</div>
                                    <input type="text" class="form-control range-to" name="toDate" id="toDate">
                                </div>
                            </div>
                        </div>
                    </div><!-- end of row -->
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="col-md-2">
                    <div class="form-group">
                        <input type="text" id="devices-table-search" class="form-control" autofocus
                            placeholder=" بحث ">
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="devices-table" class="table table-striped table-bordered p-0" class="table datatable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>صورة الجهاز</th>
                                <th>نوع الجهاز</th>
                                <th>أسم الجهاز</th>
                                <th>SN</th>
                                {{-- <th>الشركة المصنعة</th> --}}
                                {{-- <th>الشركة الموردة</th> --}}
                                {{-- <th>موديل الجهاز</th> --}}
                                {{-- <th>فترة الضمتانة</th> --}}
                                <th>أسم القسم</th>
                                <th>أسم الوحدة</th>
                                <th>الحالة</th>
                                <th>ملاحظات</th>
                                <th>اسم الموظف</th>
                                <th>تاريخ الانشاء</th>
                                <th>الاعدادات</th>
                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

<script>
    let devicesTable = $('#devices-table').DataTable({
        dom: "tiplr",
        responsive: true,
        serverSide: true,
        processing: true,
        ajax: {
            url: '{{ route('viewdevices.data') }}',
        },
        columns: [
            // {data: 'record_select', name: 'record_select', searchable: false, sortable: false, width: '1%'},
            {
                data: 'id',
                name: 'id'
            },
            {
                data: 'image',
                name: 'image'
            },
            {
                data: 'deviceTypes',
                name: 'deviceTypes'
            },
            {
                data: 'title',
                name: 'title'
            },
            // {data: 'manufacturer', name: 'manufacturer'},
            // {data: 'model', name: 'model'},
            {
                data: 'sn',
                name: 'sn'
            },
            // {data: 'supplier', name: 'supplier'},
            // {data: 'warranty', name: 'warranty'},
            {
                data: 'department_id',
                name: 'department_id'
            },
            {
                data: 'sub_department_id',
                name: 'sub_department_id'
            },
            {
                data: 'active',
                name: 'active'
            },
            {
                data: 'description',
                name: 'description'
            },
            {
                data: 'Created_by',
                name: 'Created_by',
                searchable: false
            },
            {
                data: 'created_at',
                name: 'created_at',
                searchable: false
            },
            {
                data: 'actions',
                name: 'actions',
                searchable: false,
                sortable: false,
                width: '10%'
            },
        ],
        order: [
            [9, 'desc']
        ],
        // drawCallback: function (settings) {   
        //     $('.record__select').prop('checked', false);
        //     $('#record__select-all').prop('checked', false);
        //     $('#record-ids').val();
        //     $('#bulk-delete').attr('disabled', true);
        // }
    });

    $('#devices-table-search').keyup(function() {
        devicesTable.search(this.value).draw();
    })

    // $('#status').change(function() {
    //     $('#devices-table').dataTable().fnFilter($(this).val(), -4);
    // });

    $('#deviceTypes').change(function() {
        $('#devices-table').dataTable().fnFilter($(this).val(), -7);
    });


    $('#subdepartments').change(function() {
        $('#devices-table').dataTable().fnFilter($(this).val(), -6);
    });

    $('#departments').change(function() {
        $('#devices-table').dataTable().fnFilter($(this).val(), -7);
    });
</script>

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
            axios.get(`/departments/${departmentId}`)
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

@endsection
