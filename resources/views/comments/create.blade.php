
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
    <div class="col-md-12 mb-30">     
      <div class="card card-statistics h-100"> 
        <div class="card-body">   
          <h5 class="card-title">وصف المشكلة </h5>
          <form>
            <div class="row">

                <input type="hidden" id="maintenancerequest_id" name="maintenancerequest_id"
                
                                   value="{{ $maintenancerequest->id }}" >

                    <div class="col-md-12 mb-30">
                        <div class="col">
                            <label for="body">وصف المشكلة</label>
                            <textarea class="form-control" style="resize: none;"  type="text" id="body" name="body" rows="4"
                                placeholder="وصف المشكلة" cols="50"></textarea>
                        </div>
                    </div>                
            </div>                    
            <!-- /.card-body -->
            <div class="modal-footer">
                <button type="button" onclick="performStore()" class="btn btn-primary">أنشاء تذكرة</button>
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
            body: document.getElementById('body').value,
            // active: document.getElementById('active').checked,
        };
            
        store('/Request/comments',data);
    }
</script>

@endsection

