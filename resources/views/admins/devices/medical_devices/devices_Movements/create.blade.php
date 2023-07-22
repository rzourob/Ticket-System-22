@extends('layouts.master')
@section('css')
<!---Internal Fileupload css-->
<link href="{{ URL::asset('assets/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
<!---Internal Fancy uploader css-->
<link href="{{ URL::asset('assets/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />

<link rel="stylesheet" href="{{asset('assets/js/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/js/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@section('title')
    حركة الجهاز
@stop
@endsection
@section('PageTitle')
<!-- breadcrumb -->
@section('PageTitle2')
    حركة الجهاز
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
                    <h4 style="font-family: 'Cairo', sans-serif"> أضافة حركة  </h4>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="card-body">
    <!-- Large modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">أضافة حركة</button> 
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <div class="modal-title"><div class="mb-10">
              <h4 style="font-family: 'Cairo', sans-serif">أضافة حركة جديد</h4>
            </div>
            </div>
          </div>
          <div class="modal-body">

            <form id="create_form">
                @csrf

                    <div class="row">
                        <input type="hidden" id="device_id" name="device_id" value="{{ $devices->id }}">
                        <div class="col-sm-4 mb-30">
                            <!-- select -->
                            <div class="col">
                                <label> نوع الحركة</label>
                                <select class="custom-select" id="movement_type">
                                    <option value=""> اختارح نوع الحركة</option>
                                    <option value="1">حركة داخل القسم</option>
                                    <option value="2">حركة خارج القسم</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="col">
                                <label for="title" class="mr-sm-2"> عنوان الحركة </label>
                                <input type="text" name="title" class="form-control" id="title"
                                    placeholder="ادخل عنوان الحركة">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="col">
                                <label for="newLocation	" class="mr-sm-2">موقع الجهاز </label>
                                <input type="text" name="newLocation" class="form-control" id="newLocation"
                                    placeholder="ادخل موقع الجهاز ">
                            </div>
                        </div>

                        <div class="col-md-12 mb-30">
                            <div class="col">
                                <label for="body">أضافة تعليق</label>
                                <textarea class="form-control" style="resize: none;" type="text" id="body" name="body" rows="4"
                                    placeholder="أضافة تعليق" cols="50"></textarea>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="row">
                        <div class="col-sm-4 mb-30">
                            <!-- select -->
                            <div class="col">
                                <label> حالة التذكرة</label>
                                <select class="custom-select" id="new_status">
                                    <option value=""> اختارح نوع الطلب</option>
                                    <option value="1">مفتوحة</option>
                                    <option value="2">مغلقة</option>
                                </select>
                            </div>
                        </div>

                    </div> --}}
                    <!-- /.card-body -->
                    <div class="modal-footer">
                        <button type="button" onclick="performStore()" class="btn btn-primary">أضافة رد</button>
                    </div>
                
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                {{-- <h5 class="card-title">أضافة تعليق </h5> --}}

                <div  >

                    @foreach ($deviceMovements as $deviceMovement)
                        <div class="card mt-3">
                            <h5 class="card-header" style="font-family: 'Cairo', sans-serif">
                                {{ $deviceMovement->title }}
                
                                <span class="badge rounded-pill bg-warning text-dark">
                                    {{ $deviceMovement->created_by }}
                                </span>
                
                            </h5>
                
                            <div class="card-body">
                                <div class="card-text">
                                    <div class="float-start">
                                        {{ $deviceMovement->body }}
                                    </div>
                                    <br>
                
                                    <small>أخرتحديث - {{ $deviceMovement->updated_at->diffForHumans() }}
                                    </small>
                
                                    <div class="modal-footer" class="d-flex justify-center align-center">
                
                
                
                                        @if ($deviceMovement->created_by === Auth::user()->name)
                
                                        <a  href="{{ route('admin.Movements_medical.edit', $deviceMovement->id) }}" class="btn btn-success left justify-center"><i class="fa fa-trash-o" aria-hidden="true"></i>
                                            تعديل الرد
                                        </a>
                
                
                                        <a href="#" onclick="performDestroy({{ $deviceMovement->id }},this)  "class="btn btn-danger">حذف
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        @endif
                                    </div>
                
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                
                
                        </div>
                    @endforeach
                
                </div>

            </div>
        </div>
    </div>
</div>

<!-- row closed -->
@endsection
@section('js')
<link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
<script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>

<script>
    function performStore() {
        let data = {
            title: document.getElementById('title').value,
            movement_type: document.getElementById('movement_type').value,
            body: document.getElementById('body').value,
            device_id: document.getElementById('device_id').value,
            newLocation: document.getElementById('newLocation').value,
        };

        store('/devices/Device_Movements', data);
    }
</script>

<script>
    function performDestroy(id, ref) {
        confirmDestroy('/admin/Movements_Medicl/destroy/' + id, ref);

    }
</script>

@endsection
