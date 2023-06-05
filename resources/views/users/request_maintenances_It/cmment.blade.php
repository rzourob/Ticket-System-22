
@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="{{asset('admin/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@section('title')
أضافة تعليق
@stop
@endsection
@section('PageTitle')
<!-- breadcrumb -->
@section('PageTitle2')
أضافة تعليق

@stop
<!-- breadcrumb -->
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
      <div class="card card-statistics h-100">
          <div class="card-body">
              <form>
                  <h4 style="font-family: 'Cairo', sans-serif">أضافة تعليق</h4>
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
          {{-- <h5 class="card-title" style="font-family: 'Cairo', sans-serif">أضافة تعليق </h5> --}}
          <form>
            <div class="row">

                <input type="hidden" id="maintenancerequest_id" name="maintenancerequest_id"
                
                        value="{{ $maintenancerequests->id }}" >

                <input type="" id="user_id" name="user_id"
                
                        value="{{ $users->id}}" >

                    <div class="col-md-12 mb-30">
                        <div class="col">
                            <label for="body">التعليق</label>
                            <textarea class="form-control" style="resize: none;"  type="text" id="body" name="body" rows="4"
                                placeholder="أضافة تعليق" cols="50"></textarea>
                        </div>
                    </div>                
            </div>  
            
            <div class="row">

                <div class="col-sm-4 mb-30">
                    <!-- select -->
                    <div class="col">
                        <label> حالة التذكرة</label>
                      <select class="custom-select"   id="new_status">
                        <option value=""> اختارح نوع الطلب</option>
                        <option value="1">مفتوحة</option>
                        <option value="2">مغلقة</option>
                      </select>
                    </div>
                  </div>

            </div>
            <!-- /.card-body -->
            <div class="modal-footer">
                <button type="button" onclick="performStore()" class="btn btn-primary">أضافة تعليق</button>
            </div>
        </form> 
        </div>
      </div>   
    </div> 
</div>

<!-- row closed -->
@endsection
@section('js')
<link rel="stylesheet" href="{{asset('admin/plugins/select2/css/select2.min.css')}}">
<script src="{{asset('admin/plugins/select2/js/select2.full.min.js')}}"></script>
    
<script>

    function performStore(){
        let data = {
            maintenancerequest_id: document.getElementById('maintenancerequest_id').value,
            user_id: document.getElementById('user_id').value,
            body: document.getElementById('body').value,
            new_status: document.getElementById('new_status').value,

        };
            
        store('/user/cmments/store',data);
    }
</script>

@endsection

