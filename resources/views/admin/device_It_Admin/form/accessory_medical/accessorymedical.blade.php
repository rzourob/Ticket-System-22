<div class="tab-pane fade" id="contact-08" role="tabpanel" aria-labelledby="contact-08-tab">
    <h3>
        <p class="text-danger">جاري العمل علي تجهيزة هذا القسم الملحقات.</p>
    </h3>

    <div class="panel panel-primary tabs-style-2">

        <div class="panel-body tabs-menu-body main-content-body-right border">
            <div class="tab-content">
                <div class="tab-pane active" id="tab0140">
                    <div class="card-body">

                        <div class="card card-statistics">

                            <div class="card-body">
                                <!-- Large modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target=".bd-example-modal-lg" style="font-family: 'Cairo', sans-serif">اضافة
                                    قسم</button>
                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                                    style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="modal-title">
                                                    <div class="mb-10">
                                                        <h2>أضافة قسم جديد</h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-body">

                                                <form id="create_form">
                                                    @csrf
                                                    <div class="row">

                                                        <div class="col-md-2 mb-30">
                                                            <div class="col">

                                                                <input type="hidden" name="device_id" id="device"
                                                                    value="{{ $devices->id }}">

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">

                                                        <div class="col-md-6">
                                                            <div class="col">
                                                                <label for="title" class="mr-sm-2">أسم الملحق</label>
                                                                <input type="text" name="title"
                                                                    class="form-control" id="title"
                                                                    placeholder="ادخل اسم المدينة القسم الانجيليزية">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 ">
                                                            <div class="col">
                                                                <label for="sn" class="mr-sm-2">سيريل نمبر
                                                                    الملحق</label>
                                                                <input type="text" name="sn"
                                                                    class="form-control" id="sn"
                                                                    placeholder="ادخل اسم القسم باللغة العربية">
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12 mb-30">
                                                            <div class="col">
                                                                <label for="description">وصف القسم</label>
                                                                <textarea class="form-control" style="resize: none;" type="text" id="description" name="description" rows="4"
                                                                    placeholder="وصف القسم" cols="50"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-check">
                                                        <input type="checkbox" name="active"class="form-check-input"
                                                            id="active">
                                                        <label class="form-check-label" for="active">تفعيل</label>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" onclick="performStore22()"
                                                            class="btn btn-primary">أنشاء قسم</button>
                                                    </div>

                                                </form>

                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" onclick="performStore22()"
                                                    class="btn btn-primary">أنشاء قسم</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br><br>
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

                                @foreach ($accessorymedicals as $accessorymedical)
                                    <tr>
                                        <td>{{ $accessorymedical->id }}</td>
                                        <td>{{ $accessorymedical->device->title }}</td>
                                        <td>{{ $accessorymedical->title }}</td>
                                        <td>{{ $accessorymedical->sn }}</td>
                                        <td><div class="form-group">
                                            <div class="form-group">
                                                <img class="profile-user-img img-fluid img-circle"
                                                    style="width:200px; height:200px; position:absolute; top:-1px; left:100px; border-radius:50%"
                                                    src="{{ Storage::url('public/accessorymedicals/' . $accessorymedical->image ?? '') }}"
                                                    alt="User profile picture">
                                            </div>
                                        </div></td>
                                        <td>{{ $accessorymedical->description }}</td>
                                        <td>{{ $accessorymedical->Created_by }}</td>
                                        <td>
                                            <div class="btn-group">

                                                <a class="btn btn-info" href="#" target="_blank"
                                                    role="button">عرض
                                                    <i class="fa fa-eye" aria-hidden="true"></i>

                                                </a>

                                                <a class="btn btn-secondary" href="">تحميل
                                                    <i class="fas fa-cloud-download-alt"></i>

                                                </a>

                                                <a href="#" onclick="# " class="btn btn-danger">حذف
                                                    <i class="fa fa-trash"></i>
                                                </a>

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
            function performStore22() {

                let formData = new FormData();
                formData.append('title', document.getElementById('title').value);
                formData.append('sn', document.getElementById('sn').value);
                // formData.append('image', document.getElementById('image').value);
                formData.append('description', document.getElementById('description').value);
                formData.append('active', document.getElementById('active').value);
                formData.append('device_id', document.getElementById('device').value);
                store('/admin/Accessory', formData);

            }
        </script>
        
    @endsection
