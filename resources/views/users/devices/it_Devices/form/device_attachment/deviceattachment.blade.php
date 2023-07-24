<div class="tab-pane fade" id="portfolio-07" role="tabpanel" aria-labelledby="portfolio-07-tab">
    {{-- <h3>
        <p class="text-danger">جاري العمل علي تجهيزة هذا القسم قريباً.</p>
    </h3> --}}
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
                                                    href="{{ route('user.View_file_pdf_user', $deviceattachment->id) }}"
                                                    target="_blank" role="button">عرض
                                                    <i class="fa fa-eye" aria-hidden="true"></i>

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
            </div>
        </div>
    </div>
    <!-- row closed -->
</div>


