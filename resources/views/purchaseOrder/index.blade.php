@extends('layouts.master')

@section('css')

@section('title')
طلبات شراء
@stop
@endsection
<!-- breadcrumb -->
@section('PageTitle')
<!-- breadcrumb -->

@section('PageTitle2')
طلبات شراء
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
                    <a href="{{ route('purchaseOrder.create') }}" class="btn btn-block btn-outline-success btn-lg">أضافة
                        طلب شراء</a>
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
                        <input type="text" id="purchase-table-search" class="form-control" autofocus
                            placeholder=" بحث ">
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="purchase-table" class="table table-striped table-bordered p-0" class="table datatable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>رقم طلب الشراء</th>
                                <th>عنوان طلب الشراء</th>
                                <th>القسم</th>
                                <th>رقم الموازنة</th>
                                <th>مقدم الطلب</th>
                                <th>حالة الطلب</th>
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
            url: '{{ route('devices.data') }}',
        },
        columns: [
            // {data: 'record_select', name: 'record_select', searchable: false, sortable: false, width: '1%'},
            {
                data: 'id',
                name: 'id'
            },
            {
                data: 'order_No',
                name: 'order_No'
            },
            
            {
                data: 'description',
                name: 'description'
            },

            {
                data: 'department_id',
                name: 'department_id'
            },

            {
                data: 'budget_No',
                name: 'budget_No'
            },
            
            {
                data: 'Created_by',
                name: 'Created_by',
                searchable: false
            },

            {
                data: 'status',
                name: 'status'
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
            [7, 'desc']
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

    $('#status').change(function() {
        $('#requests-table').dataTable().fnFilter($(this).val(), -4);
    });


    $('#subdepartments').change(function() {
        $('#requests-table').dataTable().fnFilter($(this).val(), -5);
    });

    $('#departments').change(function() {
        $('#requests-table').dataTable().fnFilter($(this).val(), -6);
    });
</script>

@endsection
