@extends('layouts.master')
@section('css')
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assets/js/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@section('title')
    أنشاء طلب صيانة
@stop
@endsection
@section('PageTitle')
<!-- breadcrumb -->
@section('PageTitle2')
    أنشاء طلب صيانة

@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->

<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <h5 class="card-title">طلب شراء</h5>
                <form>
                    {{-- <div class="row invoice-info">
            <div class="col-sm-2 invoice-col">
                <address>
                    <strong></strong><br>
                    <label for="order_No" class="mr-sm-2">رقم الطلب</label>
                        <input type="text" name="order_No" class="form-control" id="order_No"
                        placeholder="ادخل باركود الجهاز" >                   
                </address>
            </div>

            <div class="col-sm-8 invoice-col">
                <address>
                   
                </address>
            </div>

            <div class="col-sm-2 invoice-col">
                <address>
                    <strong></strong><br>
                    <label for="date" class="mr-sm-2">رقم الطلب</label>
                        <input type="date" name="date" class="form-control" id="date"
                        placeholder="ادخل باركود الجهاز" >                   
                </address>
            </div>
        </div> --}}
                    <div class="row">
                        <div class="col-md-4 mb-30">
                            <div class="col">
                                <label for="order_No" class="mr-sm-2">رقم الطلب</label>
                                <input type="text" name="order_No" class="form-control" id="order_No"
                                    placeholder="ادخل رقم الطلب">
                            </div>
                        </div>

                        <div class="col-md-4 mb-30">
                            <div class="col">
                                <label for="date" class="mr-sm-2"> تاريخ الطلب</label>
                                <input type="date" name="date" class="form-control" id="date"
                                    placeholder="ادخل تاريخ الطلب">
                            </div>
                        </div>


                        <div class="col-md-4 mb-30">
                            <div class="col">
                                <label for="budget_No" class="mr-sm-2">رقم الجوال</label>
                                <input type="text" name="budget_No" class="form-control" id="budget_No"
                                    placeholder="ادخل رقم الجوال">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label> القسم</label>
                                <select class="custom-select" id="departments" style="width: 100%;">
                                    <option value="">أختار القسم</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-md-4 mb-30">
                            <div class="col">
                                <label for="budget_No" class="mr-sm-2">رقم الميزانية</label>
                                <input type="text" name="budget_No" class="form-control" id="budget_No"
                                    placeholder="ادخل رقم الميزانية">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="col">
                                <label for="currency_type" class="mr-sm-2"> سعر صرف الدولار </label>
                                <input type="text" name="currency_type" class="form-control" id="currency_type"
                                    placeholder="ادخل سعر الصرف ">
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="col">
                                <label for="description" class="mr-sm-2">وصف مبدائي </label>
                                <input type="text" name="description" class="form-control" id="description"
                                    placeholder="وصف مبدائي">
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <h5 class="card-title">الأصناف المطلوبة</h5>

                <form id="form4">
                    <div class="row">
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            <h5>الصنف </h5>
                                        </th>
                                        <th>
                                            <h5> الوحدة </h5>
                                        </th>
                                        <th>
                                            <h5> الكمية </h5>
                                        </th>
                                        <th>
                                            <h5> سعر الوحدة </h5>
                                        </th>
                                        <th>
                                            <h5> السعر الاجمالي </h5>
                                        </th>
                                        <th><a href="javascript:void(0)" class="btn btn-success addRow">أضافة</a></th>
                                    </tr>
                                </thead>
                                <tbody id="select_labTest">
                                    <tr class="lab_select" id="lab_select">
                                        <td>
                                            <input type="text" name="item" class="form-control" id="item"
                                                placeholder="ادخل اسم الصنف">
                                        </td>

                                        <td>
                                            <input type="text" name="unit" class="form-control" id="unit"
                                                placeholder="الوحدة">
                                        </td>

                                        <td>
                                            <input type="text" name="qty" class="form-control qty" 
                                                placeholder="الكمية">
                                        </td>

                                        <td>
                                            <input type="text" name="unit_price" class="form-control unit_price"  
                                                value="0.0" required>
                                        </td>

                                        <td>
                                            <input type="text" name="total_price" class="form-control total_price"
                                                id="total_price" value="0.0" required>
                                        </td>

                                        <th><a href="javascript:void(0)" class="btn btn-danger deleteRow">حذف</a></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </form>

                <form id="form4">
                    <div class="row">

                        <div class="col-md-4 mb-30">
                            <div class="col">
                                <label for="sum_total" class="mr-sm-2">الاجمالي بالعملة المحلية</label>
                                <input type="text" name="sum_total" class="form-control" id="sum_total"
                                    placeholder="ادخل باركود الجهاز" required>
                            </div>
                        </div>


                        <div class="col-md-4 mb-30">
                            <div class="col">
                                <label for="Total" class="mr-sm-2">الاجمالي بالدولار</label>
                                <input type="text" name="Total" class="form-control" id="Total"
                                    placeholder="ادخل باركود الجهاز" value="0.0" required>
                            </div>
                        </div>
                    </div>

                </form>

                <!-- /.card-body -->
                <div class="modal-footer text-center">
                    <button type="button" onclick="performStore()"
                        class="btn btn-primary btn-outline backForm btn-lg">أضافة الطلب</button>
                </div>


            </div>
        </div>
    </div>
</div>

<!-- row closed -->
@endsection
@section('js')
<link rel="stylesheet" href="{{ asset('assets/js/select2/css/select2.min.css') }}">
<script src="{{ asset('assets/js/select2/js/select2.full.min.js') }}"></script>

<!--Internal Fileuploads js-->
<script src="{{ URL::asset('assets/fileuploads/js/fileupload.js') }}"></script>
<script src="{{ URL::asset('assets/fileuploads/js/file-upload.js') }}"></script>

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

            axios.get(`/admin/departments/${departmentId}`)

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

<script>
    //Initialize Select2 Elements
    $('.departments').select2({
        theme: 'bootstrap4'
    })

    //Initialize Select2 Elements
    $('.subdepartments').select2({
        theme: 'bootstrap4'
    })

    //  //Initialize Select2 Elements
    //  $('.deviceTypes').select2({
    // theme: 'bootstrap4'
    // })
</script>
@include('purchaseOrder.javascript.repeaterForm')

{{-- <script>
    $('#example1').keyup(function() {

            var currency_type = parseFloat(document.getElementById("currency_type").value);

            var unit_price = parseFloat(document.getElementById("unit_price").value);

            var total_price = parseFloat(document.getElementById("total_price").value);

            var Total = parseFloat(document.getElementById("Total").value);

            var qty = parseFloat(document.getElementById("qty").value);

            var Amount_Commission2 = unit_price * qty;

            var Amount_Commission3 = Amount_Commission2 * currency_type;

            
            //   alert(Amount_Commission3)
            var intResults = Amount_Commission2;

            var intResults2 = Amount_Commission3;

            console.log (intResults)
            //   alert(Amount_Commission2)
            sumq = parseFloat(intResults).toFixed(2);

            sumt = parseFloat(intResults2).toFixed(2);

            document.getElementById("total_price").value = sumq;

            document.getElementById("Total").value = sumt;
        })
   
</script> --}}
<script>
// $('#example1').keyup(function() {
//     console.log($(this))
// })

$('tbody').on('change','.unit_price', function(){ 
    var parent=$(this).parent().parent()
    var qty = $(".qty", parent).val()
    var unit_price = $(".unit_price", parent).val()
 $(".total_price", parent).val(qty*unit_price)

 $(".total_price", parent).trigger( "change" )

});

$('tbody').on('change','.qty', function(){ 
    var parent=$(this).parent().parent()
    var qty = $(".qty", parent).val()
    var unit_price = $(".unit_price", parent).val()
 $(".total_price", parent).val(qty*unit_price)

 $(".total_price", parent).trigger( "change" )

});

$('tbody').on('change','.total_price', function(){ 

var sum_total=0;
var totalx = $('.total_price')
totalx.each(function( index ) {
    sum_total += parseFloat($( this ).val())

});

$('#sum_total').val(sum_total)

$("#sum_total").trigger( "change" )
});


$('#sum_total').change(function(){

var sum_total = parseFloat($('#sum_total').val())
var currency_type =parseFloat($('#currency_type').val())
var total_usd = sum_total/currency_type

total_usd = parseFloat(total_usd).toFixed(2);


$('#Total').val(total_usd)

console.log(total_usd)
  
});
// Total
// currency_type
    </script>

@endsection
