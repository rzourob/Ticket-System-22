<div class="tab-pane fade" id="portfolio-07" role="tabpanel" aria-labelledby="portfolio-07-tab">
    {{-- <h3>
        <p class="text-danger">جاري العمل علي تجهيزة هذا القسم قريباً.</p>
    </h3> --}}
    <div class="panel panel-primary tabs-style-2">

        <div class="panel-body tabs-menu-body main-content-body-right border">
            <div class="tab-content">
                <div class="tab-pane active" id="tab0130">
                    <div class="card-body">


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

                                <?php $i= 0 ; ?>

                                @foreach ($deviceattachments as $deviceattachment)

                                <?php $i++ ; ?>
                                    <tr>
                                        <td>{{ $i }}</td>
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
                                                    href="{{ route('user.View_fileMedical_user', $deviceattachment->id) }}"
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


