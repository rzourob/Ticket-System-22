<div class="tab-pane fade" id="portfolio-07" role="tabpanel" aria-labelledby="portfolio-07-tab">
    <h3>
        <p class="text-danger">جاري العمل علي تجهيزة هذا القسم قريباً.</p>
    </h3>
    <div class="panel panel-primary tabs-style-2">

        <div class="panel-body tabs-menu-body main-content-body-right border">
            <div class="tab-content">
                <div class="tab-pane active" id="tab0130">
                    <div class="card-body">

                        <div class="card card-statistics">

                            <div class="card-body">
                                <p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
                                <h5 style="font-family: 'Cairo', sans-serif" class="card-title">اضافة مرفقات</h5>
                                <form>
                                    {{-- {{ csrf_field() }} --}}
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="file_name" name="file_name"
                                            required>

                                        <input type="hidden" name="device_id" id="device_id" {{-- value="{{ $familydetails->form_no }}" --}}
                                            value="{{ $devices->id }}">


                                        <label class="custom-file-label" for="customFile">حدد
                                            المرفق</label>
                                    </div><br><br>
                                    {{-- <button type="submit" class="btn btn-primary btn-sm "
                                        name="uploadedFile">تاكيد</button> --}}
                                    {{-- <div class="card-footer"> --}}
                                    <div class="">
                                        <button type="button" name="uploadedFile" onclick="performStore()"
                                            class="btn btn-primary ">تاكيد</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <!-- -->
                        {{-- <div class="col-md-12 text-center ">
                            <table class="card-title ">
                                <strong>
                                    <h4 class=" card-header  mb-5 my-auto">
                                        الاستبانة الاجتماعية</h4>
                                </strong>
                            </table>
                        </div> --}}
                        <br><br>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        <h6 style="font-family: 'Cairo', sans-serif">ID
                                        </h6>
                                    </th>
                                    <th>
                                        <h6 style="font-family: 'Cairo', sans-serif">أسم الجهاز
                                        </h6>
                                    </th>
                                    {{-- <th>
                                        <h5 style="font-family: 'Cairo', sans-serif">السيريل
                                            نمبر</h5>
                                    </th> --}}
                                    <th>
                                        <h6 style="font-family: 'Cairo', sans-serif">أسم المرفق
                                        </h6>
                                    </th>
                                    <th>
                                        <h6 style="font-family: 'Cairo', sans-serif">تاريخ
                                            الاضافة</h6>
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

                                @foreach ($deviceattachments as $deviceattachment)
                                    <tr>
                                        <td>{{ $deviceattachment->id }}</td>
                                        {{-- <td><a href="{{ route('familydetails.show', $familydetail->id) }}"
                                                class="btn btn-info">{{ $familydetail->form_no }}</a>
                                        </td>  --}}

                                        <td>{{ $deviceattachment->device->title }}</td>
                                        <td>{{ $deviceattachment->file_name }}</td>

                                        <td>{{ $deviceattachment->created_at->format('Y-m-d H:i') }}
                                        </td>
                                        <td>{{ $deviceattachment->Created_by }}</td>
                                        <td>
                                            <div class="btn-group">

                                                <a class="btn btn-info"
                                                    href="{{ route('View_file_Admin_pdf', $deviceattachment->id) }}"
                                                    target="_blank" role="button">عرض
                                                    <i class="fa fa-eye" aria-hidden="true"></i>

                                                </a>

                                                <a class="btn btn-secondary" href="">تحميل
                                                    <i class="fas fa-cloud-download-alt"></i>

                                                </a>

                                                <a href="#"
                                                    onclick="performDestroy({{ $deviceattachment->id }},this)"
                                                    class="btn btn-danger">حذف
                                                    <i class="fa fa-trash"></i>
                                                </a>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="tab-pane" id="tab0140">
                    <p>dignissimos ducimus qui blanditiis praesentium
                        voluptatum deleniti atque corrupti quos dolores et
                        quas molestias excepturi sint occaecati cupiditate
                        non provident, similique sunt in culpa qui officia
                        deserunt mollitia animi, id est laborum et dolorum
                        fuga.</p>
                    <p>Et harum quidem rerum facilis est et expedita
                        distinctio. Nam libero tempore, cum soluta nobis est
                        eligendi optio cumque nihil impedit quo minus id
                        quod maxime</p>
                    <p class="mb-0">placeat facere possimus, omnis
                        voluptas assumenda est, omnis dolor repellendus.</p>
                </div>
                <div class="tab-pane" id="tab0150">
                    <p>praesentium voluptatum deleniti atque corrupti quos
                        dolores et quas molestias excepturi sint occaecati
                        cupiditate non provident,</p>
                    <p class="mb-0">similique sunt in culpa qui officia
                        deserunt mollitia animi, id est laborum et dolorum
                        fuga. Et harum quidem rerum facilis est et expedita
                        distinctio. Nam libero tempore, cum soluta nobis est
                        eligendi optio cumque nihil impedit quo minus id
                        quod maxime placeat facere possimus, omnis voluptas
                        assumenda est, omnis dolor repellendus.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
</div>

@section('js')
    <script type="text/javascript">
        function performStore() {

            let formData = new FormData();
            formData.append('device_id', document.getElementById('device_id').value);
            formData.append('file_name', document.getElementById('file_name').files[0]);

            store('/admin/Attachment', formData);
        }
    </script>

    <script>
        function performDestroy(id, ref) {
            confirmDestroy('/admin/Attachment/' + id, ref);

        }
    </script>
@endsection
