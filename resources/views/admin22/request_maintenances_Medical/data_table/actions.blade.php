@canany(['عرض تفاصيل التذكرة', 'أضافة رد'])
<div class="btn-group mb-1">
	<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" _msthash="3150394" _msttexthash="95992" style="direction: ltr;">الأجراءات</button>
	<div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 33px, 0px); top: 0px; left: 0px; will-change: transform;">
		<a class="dropdown-item" href="{{ route('admin.Request_Device_Medical.edit',$id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
			تعديل بيانات</a>

			@can('عرض تفاصيل التذكرة')
			<a class="dropdown-item" href="{{ route('admin.Request_Device_Medicals.show',$id) }}"><i class="fa fa-eye" aria-hidden="true"></i>
				عرض تفاصيل التذكرة</a>
			@endcan


		<a class="dropdown-item" href="{{ route('cmmentShow.data',$id) }}"><i class="fa fa-eye" aria-hidden="true"></i>
			أضافة رد</a>

		<a class="dropdown-item" href="#" onclick="performDestroy({{$id}}, this)  " class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i>
			حذف التذكرة</a>
	</div>
</div>

@endcanany

{{-- <script>

        function performDestroy(id,ref){
            confirmDestroy('/admin/devices/'+id,ref);    

        }
</script> --}}


