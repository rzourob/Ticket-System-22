@extends('layouts.master')

@section('css')

@section('title')
    عرض تذاكر الأجهزة الطبية
@stop
@endsection
<!-- breadcrumb -->
@section('PageTitle')
<!-- breadcrumb -->

@section('PageTitle2')
    عرض تذاكر الأجهزة الطبية
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <form>
                    <h4 style="font-family: 'Cairo', sans-serif">عرض تذاكر الأجهزة الطبية </h4>
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
                <h5 class="card-title" style="font-family: 'Cairo', sans-serif">فلترة البيانات</h5>
                <form>
                    <div class="row">
                        <div class="col-sm-3 mb-40">
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
                                    @foreach ($subdepartments as $subdepartment)
                                        <option value="{{ $subdepartment->id }}">{{ $subdepartment->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3 ">
                            <!-- select -->
                            <div class="form-group ">
                                <label> حالة التذكرة </label>
                                <select class="custom-select" id="deviceTypes">
                                    <option value=""> اختارح حالة التذكرة</option>
                                    <option value="Deno">انتهت</option>
                                    <option value="Todo">جاري العمل عليها</option>
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
                        <input type="text" id="Request-table-search" class="form-control" autofocus
                            placeholder=" بحث ">
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="request_maintenances_Medical" class="table table-striped table-bordered p-0"
                        class="table datatable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>رقم التذكرة</th>
                                <th>موضوع العطل</th>
                                <th>نوع الجهاز</th>
                                <th>أسم القسم</th>
                                <th>الحالة</th>
                                {{-- <th>ملاحظات</th> --}}
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
    let request_maintenances_MedicalTable = $('#request_maintenances_Medical').DataTable({
        dom: "tiplr",
        responsive: true,
        serverSide: true,
        processing: true,
        ajax: {
            url: '{{ route('Request_Device_Medical.data') }}',
        },
        columns: [
            // {data: 'record_select', name: 'record_select', searchable: false, sortable: false, width: '1%'},
            {
                data: 'id',
                name: 'id'
            },
            {
                data: 'tiket_no',
                name: 'tiket_no'
            },
            {
                data: 'title',
                name: 'title'
            },
            {
                data: 'deviceTypes',
                name: 'deviceTypes'
            },
            {
                data: 'department_id',
                name: 'department_id'
            },
            {
                data: 'status',
                name: 'status'
            },
            // {
            //     data: 'content',
            //     name: 'content'
            // },
            {
                data: 'Created_by',
                name: 'Created_by',
                searchable: false
            },
            {
                data: 'created_at',
                name: 'created_at',
                searchable: true
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
            [8, 'desc']
        ],
        // drawCallback: function (settings) {   
        //     $('.record__select').prop('checked', false);
        //     $('#record__select-all').prop('checked', false);
        //     $('#record-ids').val();
        //     $('#bulk-delete').attr('disabled', true);
        // }
    });

    $('#requests-table-search').keyup(function() {
        request_maintenances_MedicalTable.search(this.value).draw();
    })

    $('#deviceTypes').change(function() {
        $('#request_maintenances_Medical').dataTable().fnFilter($(this).val(), -7);
    });


    $('#subdepartments').change(function() {
        $('#request_maintenances_Medical').dataTable().fnFilter($(this).val(), -5);
    });

    $('#departments').change(function() {
        $('#request_maintenances_Medical').dataTable().fnFilter($(this).val(), -6);
    });

    $('#departments').change(function() {
        $('#request_maintenances_Medical').dataTable().fnFilter($(this).val(), -6);
    });

    $('#fromDate').change(function() {
        var toDate = $('#toDate').val();
        if (toDate.length > 0)
            $('#request_maintenances_Medical').dataTable().fnFilter($(this).val() + '#' + toDate, -2);
    });

    $('#toDate').change(function() {
        var fromDate = $('#fromDate').val();
        if (fromDate.length > 0)
            $('#request_maintenances_Medical').dataTable().fnFilter(fromDate + '#' + $(this).val(), -2);
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
