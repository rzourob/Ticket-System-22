<div class="tab-pane fade" id="contact-08" role="tabpanel" aria-labelledby="contact-08-tab">
    <h3>
        <p class="text-danger">جاري العمل علي تجهيزة هذا القسم الملحقات.</p>
    </h3>

    <div class="panel panel-primary tabs-style-2">

        <div class="panel-body tabs-menu-body main-content-body-right border">
            <div class="tab-content">
                <div class="tab-pane active" id="tab0140">
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        <h6 style="font-family: 'Cairo', sans-serif">ID
                                        </h6>
                                    </th>

                                    <th>
                                        <h6 style="font-family: 'Cairo', sans-serif">أسم الجهاز الرئيسي
                                        </h6>
                                    </th>

                                    <th>
                                        <h6 style="font-family: 'Cairo', sans-serif">أسم الملحق
                                        </h6>
                                    </th>

                                    <th>
                                        <h6 style="font-family: 'Cairo', sans-serif">السيريل نمبر الملحق
                                            الاضافة</h6>
                                    </th>

                                    <th>
                                        <h6 style="font-family: 'Cairo', sans-serif">صورة الملحق
                                        </h6>
                                    </th>

                                    <th>
                                        <h6 style="font-family: 'Cairo', sans-serif">وصف
                                        </h6>
                                    </th>

                                    <th>
                                        <h6 style="font-family: 'Cairo', sans-serif">اسم الموظف
                                        </h6>
                                    </th>

                                    <th>
                                        <h6 style="font-family: 'Cairo', sans-serif">الاجراءات
                                        </h6>
                                    </th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($accessoryits as $accessoryit)
                                    <tr>
                                        <td>{{ $accessoryit->id }}</td>
                                        <td>{{ $accessoryit->device->title }}</td>
                                        <td>{{ $accessoryit->title }}</td>
                                        <td>{{ $accessoryit->sn }}</td>
                                        <td><div class="form-group">
                                            <div class="form-group">
                                                <img class="profile-user-img img-fluid img-circle"
                                                    style="width:150px; height:100px;"
                                                    src="{{ Storage::url('public/accessoryit/' . $accessoryit->image ?? '') }}"
                                                    alt="User profile picture">
                                            </div>
                                        </div></td>
                                        <td>{{ $accessoryit->description }}</td>
                                        <td>{{ $accessoryit->Created_by }}</td>
                                        <td>
                                            <div class="btn-group">

                                                <a class="btn btn-info" href="{{ route('View_Image_it_Admin', $accessoryit->id) }}" target="_blank"
                                                    role="button">عرض
                                                    <i class="fa fa-eye" aria-hidden="true"></i>

                                                </a>

                                                {{-- <a class="btn btn-secondary" href="">تحميل
                                                    <i class="fas fa-cloud-download-alt"></i>

                                                </a> --}}
{{-- 
                                                <a href="#" onclick="performDestroy({{ $accessoryit->id }},this)  " class="btn btn-danger">حذف
                                                    <i class="fa fa-trash"></i>
                                                </a> --}}

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    @section('js')
        <script type="text/javascript">
            function performStore() {

                let formData = new FormData();
                formData.append('title', document.getElementById('title').value);
                formData.append('sn', document.getElementById('sn').value);
                // formData.append('image', document.getElementById('image').value);
                formData.append('description', document.getElementById('description').value);
                formData.append('active', document.getElementById('active').value);
                formData.append('device_id', document.getElementById('device').value);
                store('/admin/Accessory_It/store/', formData);

            }
        </script>

{{-- <script>

    function performDestroy(id, ref) {
        confirmDestroy('/admin/Accessory_destroy/' + id, ref);

    }
</script> --}}
        
    @endsection
