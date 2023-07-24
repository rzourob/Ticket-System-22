
@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="{{asset('admin/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@section('title')
أنشاء تذكرة
@stop
@endsection
@section('PageTitle')
<!-- breadcrumb -->
@section('PageTitle2')
أنشاء تذكرة
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <form>
                    <h4 style="font-family: 'Cairo', sans-serif"> أنشاء تذكرة </h4>
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
            {{-- <h5 class="card-title" style="font-family: 'Cairo', sans-serif">حدد نوع التذكرة</h5> --}}
            <form >
                <div class="row">
                    <div class="col-sm-4">
                        <!-- select -->
                        <div class="form-group">
                            {{-- <label> نوع طلب الصيانة</label> --}}
                            <h6 class="card-title" style="font-family: 'Cairo', sans-serif">حدد نوع التذكرة</h6>
                          <select class="custom-select"  name="deviceTypes"  id="deviceTypes">
                            <option value=""> اختارح نوع الطلب</option>
                            <option value="1" > جهاز طبي</option>
                            <option value="2">تكنولوجيا المعلومات</option>
                            <option value="3">هندسة وصيانة</option>
                          </select>
                        </div>
                      </div>

                </div>

        </form>

          </div>
        </div>   
      </div>

</div>

@include('users.request_maintenances_It.forms.maintenanances_it')
@include('users.request_maintenances_It.forms.maintenanances_medical')


<!-- row closed -->
@endsection
@section('js')
<link rel="stylesheet" href="{{asset('admin/plugins/select2/css/select2.min.css')}}">
<script src="{{asset('admin/plugins/select2/js/select2.full.min.js')}}"></script>
    
<script>

$('#subdepartments').attr('disabled',true);

$('#departments').on('change', function() {

$('#subdepartments').attr('disabled',this.value == -1);

    if(this.value != -1){
        // alert (this.value);
        getSubdepartments(this.value);

        // console.log(getSubdepartments);

    }

    function getSubdepartments(departmentId) {

        // axios.get(`/admin/departments/${departmentId}`)

     axios.get(`/admin/departments/${departmentId}`)


        .then(function (response) {
            console.log(response);
            if(response.data.subDepartment.length !=0){
                $('#subdepartments').empty();
                   $.each(response.data.subDepartment , function(i,item){
                    $('#subdepartments').append(new Option(item['title'], item['id']))
                   });
            }else{
                $('#subdepartments').attr('disabled',true);
            }
        })

    }  
})

</script>

<script>

    $('#subproblems').attr('disabled',true);
    
    $('#problems').on('change', function() {
    
    $('#subproblems').attr('disabled',this.value == -1);
    // alert (this.value);

        if(this.value != -1){
            // alert (this.value);
            getSubProblemtypes(this.value);
    
        }
    
        function getSubProblemtypes(problemId) {
    
            // axios.get(`/admin/departments/${departmentId}`)
    
         axios.get(`/admin/problems/${problemId}`)
    
        //  console.log( axios.get(`/admin/problemTypes/${problemTypeId}`));subproblems
        .then(function (response) {
            console.log(response);
            if(response.data.subproblems.length !=0){
                $('#subproblems').empty();
                   $.each(response.data.subproblems , function(i,item){
                    $('#subproblems').append(new Option(item['title'], item['id']))
                   });
            }else{
                $('#subproblems').attr('disabled',true);
            }
        })


    
        }  
    })
    
    </script>

    ///////////////


<script>

    $('#subproblems22').attr('disabled',true);
    
    $('#problems22').on('change', function() {
    
    $('#subproblems22').attr('disabled',this.value == -1);
    // alert (this.value);

        if(this.value != -1){
            // alert (this.value);
            getSubProblemtypes(this.value);
    
        }
    
        function getSubProblemtypes(problemId) {
    
            // axios.get(`/admin/departments/${departmentId}`)
    
         axios.get(`/admin/problems/${problemId}`)
    
        //  console.log( axios.get(`/admin/problemTypes/${problemTypeId}`));subproblems
        .then(function (response) {
            console.log(response);
            if(response.data.subproblems.length !=0){
                $('#subproblems22').empty();
                   $.each(response.data.subproblems , function(i,item){
                    $('#subproblems22').append(new Option(item['title'], item['id']))
                   });
            }else{
                $('#subproblems22').attr('disabled',true);
            }
        })


    
        }  
    })
    
    </script>

    ///////////////
    <script>

        $('#subdepartments22').attr('disabled',true);
        
        $('#departments22').on('change', function() {
        
        $('#subdepartments22').attr('disabled',this.value == -1);
        
            if(this.value != -1){
                // alert (this.value);
                getSubdepartments(this.value);
        
                // console.log(getSubdepartments);
        
            }
        
            function getSubdepartments(departmentId) {
        
                // axios.get(`/admin/departments/${departmentId}`)
        
             axios.get(`/admin/departments/${departmentId}`)
        
        
                .then(function (response) {
                    console.log(response);
                    if(response.data.subDepartment.length !=0){
                        $('#subdepartments22').empty();
                           $.each(response.data.subDepartment , function(i,item){
                            $('#subdepartments22').append(new Option(item['title'], item['id']))
                           });
                    }else{
                        $('#subdepartments22').attr('disabled',true);
                    }
                })
        
            }  
        })
        
        </script>

    //////////////

<script>

    function performStore(){
        let data = {
            // tiket_no: document.getElementById('tiket_no').value,
            title: document.getElementById('title').value,
            content: document.getElementById('content').value,
            author_name	: document.getElementById('author_name').value,
            author_email: document.getElementById('author_email').value,
            date: document.getElementById('date').value,
            mobile: document.getElementById('mobile').value,
            model: document.getElementById('model').value,
            sn: document.getElementById('sn').value,
            room: document.getElementById('room').value,
            // description: document.getElementById('image').value,devices
            deviceTypes: document.getElementById('deviceTypes').value,
            // device_id: document.getElementById('devices').value,
            department_id: document.getElementById('departments').value,
            sub_department_id: document.getElementById('subdepartments').value,
            problem_id: document.getElementById('problems').value,
            sub_problem_id: document.getElementById('subproblems').value,
            // active: document.getElementById('active').checked,
        };
            
        store('/user/maintenances_It/store', data);
    }
</script>

<script>
    function performStore22() {
        let data = {
            // tiket_no: document.getElementById('tiket_no').value,
            title: document.getElementById('title22').value,
            content: document.getElementById('content22').value,
            author_name: document.getElementById('author_name22').value,
            author_email: document.getElementById('author_email22').value,
            date: document.getElementById('date22').value,
            mobile: document.getElementById('mobile22').value,
            model: document.getElementById('model22').value,
            sn: document.getElementById('sn22').value,
            room: document.getElementById('room22').value,
            // description: document.getElementById('image').value,devices
            deviceTypes: document.getElementById('deviceTypes').value,
            // device_id: document.getElementById('devices').value,
            department_id: document.getElementById('departments22').value,
            sub_department_id: document.getElementById('subdepartments22').value,
            problem_id: document.getElementById('problems22').value,
            sub_problem_id: document.getElementById('subproblems22').value,
            // active: document.getElementById('active').checked,
        };

        store('/user/maintenances_Medical/store', data);
    }
</script>

    <script>
        $('#model').attr('disabled',true);
        $('#room').attr('disabled',true);
        $('#title').attr('disabled',true);
         $(document).ready(function(){
        let sn =document.getElementById('sn');
        sn.addEventListener('change',updateValue);
        function updateValue (e){
            e.preventDefault();
             if(sn.value.length === 9) {
                    $.ajax({
                        url: "{{ URL::to('admin/getdetails') }}/" + sn.value,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            title =document.getElementById('title');
                            title.value=data[0].title;

                           model =document.getElementById('model');   
                           model.value=data[0].model;

                           room =document.getElementById('room');   
                           room.value=data[0].room;

                        //    family_name =document.getElementById('family_name');   
                        //    family_name.value=data[0].family_name;

                        //     mobile =document.getElementById('mobile');   
                        //    mobile.value=data[0].mobile;

                        //    address =document.getElementById('address');   
                        //    address.value=data[0].address;

                            // $.each(data, function(key, value) {
                            //     first_name =document.getElementById('first_name').append('<option value="' +
                            //         value + '">' + value + '</option>'); 
                                    
                            // });                    
                        }, 
                    });

                } else {
                    console.log('AJAX load did not work');
                }
        }

        });
</script>

////////////
<script>
    $('#model22').attr('disabled',true);
    $('#room22').attr('disabled',true);
    $('#title22').attr('disabled',true);
     $(document).ready(function(){
    let sn22 =document.getElementById('sn22');
    sn22.addEventListener('change',updateValue);
    function updateValue (e){
        e.preventDefault();
         if(sn22.value.length === 9) {
                $.ajax({
                    url: "{{ URL::to('admin/getdetails') }}/" + sn22.value,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        title =document.getElementById('title22');
                        title.value=data[0].title;

                       model =document.getElementById('model22');   
                       model.value=data[0].model;

                       room =document.getElementById('room22');   
                       room.value=data[0].room;

                    //    family_name =document.getElementById('family_name');   
                    //    family_name.value=data[0].family_name;

                    //     mobile =document.getElementById('mobile');   
                    //    mobile.value=data[0].mobile;

                    //    address =document.getElementById('address');   
                    //    address.value=data[0].address;

                        // $.each(data, function(key, value) {
                        //     first_name =document.getElementById('first_name').append('<option value="' +
                        //         value + '">' + value + '</option>'); 
                                
                        // });                    
                    }, 
                });

            } else {
                console.log('AJAX load did not work');
            }
    }

    });
</script>
///////////

@include('users.request_maintenances_It.js.hideShowform')
@endsection



