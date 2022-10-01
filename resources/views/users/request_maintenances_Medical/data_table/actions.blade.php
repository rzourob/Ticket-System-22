<div class="btn-group mb-1">
	<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" _msthash="3150394" _msttexthash="95992" style="direction: ltr;">الأجراءات</button>
	<div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 33px, 0px); top: 0px; left: 0px; will-change: transform;">
		<a class="dropdown-item" href="{{ route('user.Request_IT.edit',$id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
			تعديل بيانات</a>

			<a class="dropdown-item" href="{{ route('user.Details_Medical.show',$id) }}"><i class="fa fa-eye" aria-hidden="true"></i>
				عرض تفاصيل التذكرة</a>


		<a class="dropdown-item" href="{{ route('user.cmmentShow',$id) }}"><i class="fa fa-eye" aria-hidden="true"></i>
			أضافة رد</a>

		{{-- <a class="dropdown-item" href="#" onclick="performDestroy({{$id}}, this)  " class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i>
			حذف التذكرة</a> --}}
	</div>
</div>

{{-- <script>

        function performDestroy(id,ref){
            confirmDestroy('/admin/devices/'+id,ref);    

        }
</script> --}}


