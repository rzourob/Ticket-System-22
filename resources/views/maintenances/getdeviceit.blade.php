
@extends('layouts.master')

@section('css')

@section('title')
عرض طلبات تكنولوجيا المعلومات
@stop
@endsection
<!-- breadcrumb -->
@section('PageTitle')
<!-- breadcrumb -->

@section('PageTitle2')
عرض طلبات تكنولوجيا المعلومات
@stop
<!-- breadcrumb -->
@endsection
@section('content')

<div class="row">
    <div class="col-md-12 mb-30">     
        <div class="card card-statistics h-100"> 
        <div class="card-body">    
            
            <form>
                {{-- <label class="large-xl" for="طلبات تكنولوجيا المعلومات">  طلبات تكنولوجيا المعلومات</label> --}}
                <h4> طلبات تكنولوجيا المعلومات <span class="label label-default">طلبات تكنولوجيا المعلومات</span></h4>
            </form>
        </div>
        </div>   
    </div>
</div>

<div class="row">
    <div class="col-md-12 mb-30">     
        <div class="card card-statistics h-100"> 
        <div class="card-body">    
            {{-- <h5 class="card-title">فلترة البيانات</h5>
            <h4>طلبات تكنولوجيا المعلومات <span class="label label-default ">طلبات تكنولوجيا المعلومات</span></h4> --}}

            <form>
                <div class="row">
                    <div class="col-sm-3 ">
                        <!-- select -->
                        <div class="form-group ">
                            <label> حالة القسم</label>
                                <select class="custom-select"   id="departments">
                                    <option value="">أختار القسم</option>
                                    @foreach ($departments as $department)
                                            <option value="{{$department->id}}">{{$department->title}}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
            
                    <div class="col-sm-3 ">
                        <!-- select -->
                        <div class="form-group ">
                            <label> حالة الوحدة</label>
                                <select class="custom-select"   id="subdepartments">
                                    <option value="">يرجي أختيار اسم الوحدة</option>
                                    @foreach ($subdepartments as $subdepartment)
                                    <option value="{{$subdepartment->id}}">{{$subdepartment->title}}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
            
                    <div class="col-sm-3 ">
                        <!-- select -->
                        <div class="form-group ">
                            <label> حالة التذكرة</label>
                                <select class="custom-select"   id="status">
                                    <option value=""> اختارح نوع الطلب</option>
                                        <option value="Todo">جاري العمل عليها</option>
                                        <option value="Done">انتهت</option>
                                </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group ">
                          <label>البحث حسب التاريخ</label>
                          <div class="input-group" data-date="23/11/2018" data-date-format="mm/dd/yyyy" id="searchDate">
                                <input type="text" class="form-control range-from" name="fromDate" id="fromDate">
                                <span class="input-group-addon">To</span>
                                <input class="form-control range-to" type="text" name="toDate"  id="toDate">
                            </div>

                        </div>
                    </div>
            
                </div><!-- end of row -->
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
                        <input type="text" id="requests-table-search" class="form-control" autofocus placeholder=" بحث ">
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="requests-table" class="table table-striped table-bordered p-0"  class="table datatable" >
                      <thead>
                            <tr>
                                <th>No.</th>
                                <th>رقم التذكرة</th>
                                <th>lموضوع العطل</th>
                                <th>نوع الجهاز</th>
                                <th>أسم القسم</th>
                                <th>أسم الوحدة</th>
                                <th>حالة التذكرة</th>
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

{{-- <div>

    <div class="float-start">
        <h4 class="pb-3">تفاصيل التذكرة</h4>
    </div>


    <div class="clearfix"></div>

</div>
  @foreach ($maintenancerequests as $maintenancerequest)

    <div class="card mt-3">
            <h5 class="card-header">
                @if ($maintenancerequest->status === 'Todo')
                    {{ $maintenancerequest->title }}
                @else
                    <del>{{ $maintenancerequest->title }}</del>
                @endif
        
                <span class="badge rounded-pill bg-warning text-dark">
                    {{ $maintenancerequest->created_at->diffForHumans() }}
                </span>
            </h5>
    
            <div class="card-body">
                <div class="card-text">
                    <div class="float-start">
                            @if ($maintenancerequest->status === 'Todo')
                                {{ $maintenancerequest->content }}
                            @else
                                <del>{{ $maintenancerequest->content }}</del>
                            @endif
                            <br>
        
                            @if ($maintenancerequest->status === 'Todo')
                                <span class="badge rounded-pill bg-info text-dark">
                                    Todo
                                </span>
                            @else
                                <span class="badge rounded-pill bg-success text-white">
                                    Done
                                </span>
                            @endif
        
                            <small>أخرتحديث - {{ $maintenancerequest->updated_at->diffForHumans() }} </small>
                    </div>
<br>
                    <div class="float-end">
                        <a href="#" class="btn btn-success">تعديل التذكرة
                            <i class="fa fa-edit"></i>
                        </a>
        
                        <form action="#" style="display: inline" method="POST" onsubmit="return confirm('Are you sure to delete ?')">
                            @csrf
                            @method('DELETE')
        
                            <button type="submit" class="btn btn-danger">حذف التذكرة
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
        
                    </div>

                    <div class="clearfix"></div>

                </div>
            </div>
    </div>
  @endforeach --}}
<!-- row closed -->
@endsection
@section('js')

<script>

let requestsTable = $('#requests-table').DataTable({
        dom: "tiplr",
        responsive: true,
        serverSide: true,
        processing: true,
        ajax: {
            url: '{{ route('wwwwwww') }}',
            data: function(d){
            d.level =   $('#levelFilter').val()
                }
        },
        columns: [
            // {data: 'record_select', name: 'record_select', searchable: false, sortable: false, width: '1%'},
            {data: 'id', name: 'id'},
            {data: 'tiket_no', name: 'tiket_no'},
            {data: 'title', name: 'title'},
            {data: 'deviceTypes', name: 'deviceTypes'},
            {data: 'department_id', name: 'department_id'},
            {data: 'sub_department_id', name: 'sub_department_id'},
            {data: 'status', name: 'status'},
            {data: 'Created_by', name: 'Created_by', searchable: false},
            // {data: 'title', name: 'title'},
            {data: 'created_at', name: 'created_at', searchable: true},
            {data: 'actions', name: 'actions', searchable: false, sortable: false, width: '10%'},
        ],
        order: [[7, 'desc']],
        // drawCallback: function (settings) {   
        //     $('.record__select').prop('checked', false);
        //     $('#record__select-all').prop('checked', false);
        //     $('#record-ids').val();
        //     $('#bulk-delete').attr('disabled', true);
        // }
    });

    $('#requests-table-search').keyup(function () {
        requestsTable.search(this.value).draw();
    })  

    $('#datak-table-search').keyup(function () {
        requestsTable.search(this.value).draw();
    })
    
    $('#status').change(function(){
        $('#requests-table').dataTable().fnFilter($(this).val(), -4);
    });


    $('#subdepartments').change(function(){
        $('#requests-table').dataTable().fnFilter($(this).val(), -5);
    });

    $('#departments').change(function(){
        $('#requests-table').dataTable().fnFilter($(this).val(), -6);
    });

    $('#fromDate').change(function() {
        var toDate = $('#toDate').val();
        if(toDate.length > 0)
            $('#requests-table').dataTable().fnFilter($(this).val() + '#' + toDate, -2);
    });

    $('#toDate').change(function() {
        var fromDate = $('#fromDate').val();
        if(fromDate.length > 0)
            $('#requests-table').dataTable().fnFilter(fromDate + '#' + $(this).val(), -2);
    });




   
</script>

@endsection



   