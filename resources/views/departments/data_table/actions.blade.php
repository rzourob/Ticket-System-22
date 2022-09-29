<div class="btn-group mb-1">
	<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" _msthash="3150394" _msttexthash="95992" style="direction: ltr;">الأجراءات</button>
	<div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 33px, 0px); top: 0px; left: 0px; will-change: transform;">
		<a class="dropdown-item" href="{{ route('departments.edit',$id) }}">تعديل بيانات</a>
		<a class="dropdown-item" href="#" onclick="performDestroy({{$id}}, this)  " class="btn btn-danger">حذف قسم</a>
	</div>
</div>

<script>

        function performDestroy(id,ref){
            confirmDestroy('/admin/departments/'+id,ref);    

        }
</script>


