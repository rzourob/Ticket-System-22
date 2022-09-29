@extends('layouts.master')

@section('css')

@section('title')
    أجهزة تكنولوجيا المعلومات
@stop
@endsection
<!-- breadcrumb -->
@section('PageTitle')
<!-- breadcrumb -->

@section('PageTitle2')
    أجهزة تكنولوجيا المعلومات
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
                    <a href="{{ route('devices.create') }}" class="btn btn-block btn-outline-success btn-lg">أضافة
                        جهاز</a>
                </td>
            </tr>
        </tbody>
    </div>
</div>
<br>
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
            url: '{{ route('devices.medical') }}',
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


    // $('.data-table-search').keyup(function () {
    //     patientsTable.column ( $(this).data('column') )
    //     .search( $(this).val() ).draw();

    // });
    // $('#data-table-citie').keyup(function () {
    //     patientsTable.search(this.value).draw();
    // })

    // $('.data-table-search').keyup(function () {
    //     patientsTable.search(this.value).draw();
    // })
</script>

@endsection
