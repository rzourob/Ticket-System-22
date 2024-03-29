@canany(['حذف جهاز', 'تعديل بيانات جهاز', 'Show-Deives', 'أضافة حركة', 'عرض تفاصيل الجهاز'])
    <div class="btn-group mb-1">

        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false" _msthash="3150394" _msttexthash="95992" style="direction: ltr;">الأجراءات</button>
        <div class="dropdown-menu" x-placement="bottom-start"
            style="position: absolute; transform: translate3d(0px, 33px, 0px); top: 0px; left: 0px; will-change: transform;">

            @can('عرض تفاصيل الجهاز')
                <a class="dropdown-item" href="{{ route('admin.devices_It.show', $id) }}"><i class="fa fa-eye"
                        aria-hidden="true"></i>
                    عرض تفاصيل الجهاز</a>
            @endcan

            @can('تعديل بيانات جهاز')
                <a class="dropdown-item" href="{{ route('admin.devices_It.edit', $id) }}"><i class="fa fa-pencil-square-o"
                        aria-hidden="true"></i>
                    تعديل بيانات</a>
            @endcan

            @can('أضافة حركة')
                <a class="dropdown-item" href="{{ route('admin.Movements_It.Movements_show', $id) }}"><i class="fa fa-pencil-square-o"
                        aria-hidden="true"></i>
                    أضافة حركة</a>
            @endcan

            @can('أضافة ملحق')
                <a class="dropdown-item" href="{{ route('admin.devices_It.accessoryit_show', $id) }}"><i
                        class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    أضافة ملحق
                </a>
            @endcan

            @can('أضافة مرفق')
                <a class="dropdown-item" href="{{ route('admin.devicesItAttachment_show', $id) }}"><i
                        class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    أضافة مرفق
                </a>
            @endcan

            @can('حذف جهاز')
                <a class="dropdown-item" href="#" onclick="performDestroy({{ $id }}, this)  "
                    class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i>
                    حذف جهاز</a>
            @endcan

        </div>
    </div>
@endcanany


<script>
    function performDestroy(id, ref) {
        confirmDestroy('/admin/devices_IT/' + id, ref);

    }
</script>
