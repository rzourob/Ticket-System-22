@extends('layouts.master')

@section('css')

@section('title')
    قائمة الاقسام
@stop
@endsection
<!-- breadcrumb -->
@section('PageTitle')
<!-- breadcrumb -->

@section('PageTitle2')
    قائمة الاقسام
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
{{-- <div class="row">
    <div class="col-md-2">
        <tbody>
            <tr>
                <td>
                    <a href="{{ route('departments.create') }}" class="btn btn-block btn-outline-success btn-lg"> اضافة قسم</a>
                </td>
            </tr>
        </tbody>
    </div>
</div> --}}

<div class="card-body">
    <!-- Large modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">اضافة عطل</button>
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">
                        <div class="mb-10">
                            <h2>أضافة عطل جديد</h2>
                        </div>
                    </div>
                </div>
                <div class="modal-body">

                    <form id="create_form">
                        @csrf

                        {{-- <div class="row">

                            <div class="col-md-6 mb-30">
                                <label for="problem" class="mr-sm-2">موضوع المشكلة</label>
                                <select class="custom-select" name="problem" id="problem">
                                    <option value=""> اختارح نوع المشكلة</option>
                                    <option value="1">software</option>
                                    <option value="2">hardware</option>
                                </select>
                            </div>

                        </div> --}}

                        <div class="row">

                            <div class="col-md-6 mb-30">
                                <div class="col">
                                    <label for="title_ar" class="mr-sm-2">أسم العطل باللغة العربية</label>
                                    <input type="text" name="title" class="form-control" id="title"
                                        placeholder="ادخل اسم القسم باللغة العربية">
                                </div>
                            </div>
                            <div class="col-md-6 mb-30">
                                <div class="col">
                                    <label for="title_en" class="mr-sm-2">أسم العطل باللغة الانجليزية</label>
                                    <input type="text" name="problem_description" class="form-control"
                                        id="problem_description" placeholder="ادخل اسم المدينة القسم الانجيليزية">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-30">
                                <div class="col">
                                    <label for="description">وصف العطل</label>
                                    <textarea class="form-control" style="resize: none;" type="text" id="description" name="description"
                                        rows="4" placeholder="وصف القسم" cols="50"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-check">
                            <input type="checkbox" name="active"class="form-check-input" id="active">
                            <label class="form-check-label" for="active">تفعيل</label>
                        </div>

                        {{-- <div class="modal-footer">
                <button type="button" onclick="performStore()" class="btn btn-primary">أنشاء قسم</button>
            </div> --}}

                    </form>

                </div>

                <div class="modal-footer">
                    <button type="button" onclick="performStore()" class="btn btn-primary">أنشاء عطل</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <form>
                    <h4 style="font-family: 'Cairo', sans-serif"> قائمة الاعطال الفنية </h4>
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
                        <input type="text" id="problemTypes-table-search" class="form-control" autofocus
                            placeholder=" بحث ">
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="problemTypes-table" class="table table-striped table-bordered p-0"
                        class="table datatable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>أسم العطل</th>
                                <th>الحالة</th>
                                <th>ملاحظات</th>
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
    let departmentTable = $('#problemTypes-table').DataTable({
        dom: "tiplr",
        responsive: true,
        serverSide: true,
        processing: true,
        ajax: {
            url: '{{ route('problem.data') }}',
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

    // $('#problemTypes-table-search').keyup(function () {
    //     problemType.search(this.value).draw();
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

<script>
    function performStore() {
        let data = {
            // problem: document.getElementById('problem').value,
            title: document.getElementById('title').value,
            // title_en: document.getElementById('title_en').value,
            description: document.getElementById('description').value,
            active: document.getElementById('active').checked,
        };
        //     let redirectUrl = '/admin/departments'
        // store('/admin/departments',data,redirectUrl);

        let redirectUrl = '/problemTypes'
        store('/admin/problems', data, redirectUrl);
    }
</script>

@endsection
