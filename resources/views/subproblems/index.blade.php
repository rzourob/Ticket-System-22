@extends('layouts.master')

@section('css')

@section('title')
    قائمة الوحدة الطبية والادارية
@stop
@endsection
<!-- breadcrumb -->
@section('PageTitle')
<!-- breadcrumb -->

@section('PageTitle2')
    قائمة الوحدة الطبية والادارية
@stop
<!-- breadcrumb -->
@endsection
@section('content')

<div class="row">
    <div class="col-md-2">
        <tbody>
            <tr>
                <td>
                    <a href="{{ route('subproblems.create') }}" class="btn btn-block btn-outline-success btn-lg"> أضافة
                        وحدة</a>
                </td>
            </tr>
        </tbody>
    </div>
</div>
<br>
<!-- row -->
<div class="row">
    <div class="col-md-12">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <form>
                    <h4 style="font-family: 'Cairo', sans-serif"> قائمة الوحدة الطبية والادارية </h4>
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
                <div class="col-md-2">
                    <div class="form-group">
                        <input type="text" id="subProblems-table-search" class="form-control" autofocus
                            placeholder=" بحث ">
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="subProblems-table" class="table table-striped table-bordered p-0"
                        class="table datatable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>الاسم العطل الفني</th>
                                <th> المشكلة الرئيسية </th>
                                <th>الحالة</th>
                                <th>ملاحظات</th>
                                <th>تاريخ الانشاء</th>
                                {{-- <th>تاريخ التحديث</th> --}}
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
    let subProblemTable = $('#subProblems-table').DataTable({
        dom: "tiplr",
        responsive: true,
        serverSide: true,
        processing: true,
        ajax: {
            url: '{{ route('subProblems.data') }}',
        },
        columns: [
            // {data: 'record_select', name: 'record_select', searchable: false, sortable: false, width: '1%'},
            {
                data: null,
                name: null,
                orderable: false,
                className: "NameRTL width50",
                render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                data: 'title',
                name: 'title'
            },
            {
                data: 'problem_types_id',
                name: 'problem_types_id'
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
            [4, 'desc']
        ],
        // drawCallback: function (settings) {   
        //     $('.record__select').prop('checked', false);
        //     $('#record__select-all').prop('checked', false);
        //     $('#record-ids').val();
        //     $('#bulk-delete').attr('disabled', true);
        // }
    });

    // $('#subproblems-table-search').keyup(function () {
    //     subProblemTable.search(this.value).draw();
    // })

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
