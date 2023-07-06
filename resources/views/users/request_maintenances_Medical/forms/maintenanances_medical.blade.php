<div class="row">
    <div class="col-md-12">
        <div class="card card-statistics h-100">
            <form id="form-medical">
                <div class="row" id="medical">
                    <div class="col-md-12 mb-30" id="medical">
                        <div class="card card-statistics h-100" id="medical">
                            <div class="card-body" id="medical">
                                <h5 class="card-title" style="font-family: 'Cairo', sans-serif">معلومات الأتصال</h5>
                                <form id="medical">
                                    <div class="row">

                                        <div class="col-md-4 mb-30">
                                            <div class="col">
                                                <label for="author_name ">أسم المرسل</label>
                                                <input type="text" name="author_name" class="form-control"
                                                    id="author_name" placeholder="يرجي ادخال اسم المرسل">
                                            </div>
                                        </div>

                                        <div class="col-md-4 mb-30">
                                            <div class="col">
                                                <label for="author_email ">البريد الاكتروني</label>
                                                <input type="email" name="author_email" class="form-control"
                                                    id="author_email" placeholder=" يرجي ادخل البريد الاكتروني"
                                                    data-max="6" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-md-4 mb-30">
                                            <div class="col">
                                                <label for="mobile" class="mr-sm-2">رقم الجوال</label>
                                                <input type="text" name="mobile" class="form-control" id="mobile"
                                                    placeholder="يرجي أدخال رقم الجوال">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <h5 class="card-title" style="font-family: 'Cairo', sans-serif">معلومات التذكرة/ اجهزة
                                    طبية</h5>
                                <form>
                                    {{-- <div class="row">
                                        <div class="col-sm-4">
                                            <!-- select -->
                                            <div class="form-group">
                                                <label> نوع طلب الصيانة</label>
                                                <select class="custom-select" id="deviceTypes">
                                                    <option value=""> اختارح نوع الطلب</option>
                                                    <option value="1"> جهاز طبي</option>
                                                    <option value="2">تكنولوجيا المعلومات</option>
                                                    <option value="3">هندسة وصيانة</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div> --}}

                                    <div class="row">
                                    </div>

                                    <div class="row">

                                        <div class="col-md-3">
                                            <div class="col">
                                                <label> أسم القسم</label>
                                                <select class="custom-select" name ="departments" id="departments22" style="width: 100%;">
                                                    <option value="-1">أختار القسم</option>
                                                    @foreach ($departments as $department)
                                                        <option value="{{ $department->id }}">{{ $department->title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3 mb-30">
                                            <div class="col">
                                                <label>أسم الوحدة</label>
                                                <select class="custom-select"  id="subdepartments22" name="subdepartments"
                                                    style="width: 100%;" class="custom-select">
                                                    <option value="">يرجي أختيار اسم الوحدة</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="date ">التاريخ</label>
                                                <input type="date" name="date" class="form-control" id="date"
                                                    placeholder="يرجي تجديد التاريخ" data-max="6" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-md-3 mb-30">
                                            <div class="col">
                                                <label for="sn" class="mr-sm-2">SN</label>
                                                <input type="text" name="sn" class="form-control" id="sn"
                                                    placeholder="ادخل SN">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="title">أسم الجهاز :</label>
                                                <input type="text" name="title" class="form-control" id="title"
                                                    placeholder="">
                                            </div>
                                        </div>


                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="model"> طراز الجهاز:</label>
                                                <input type="text" name="model" class="form-control"
                                                    id="model" placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="room ">أسم الغرفة</label>
                                                <input type="text" name="room" class="form-control"
                                                    id="room" placeholder="" data-max="6" required>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <h5 class="card-title" style="font-family: 'Cairo', sans-serif">وصف المشكلة </h5>
                                <form>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="col">
                                                <label for="title ">الموضوع</label>
                                                <input type="text" name="title" class="form-control"
                                                    id="title" placeholder="ادخال عنوان للمشكلة" data-max="6"
                                                    required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 mb-30">
                                            <div class="col">
                                                <label for="content">وصف المشكلة</label>
                                                <textarea class="form-control" style="resize: none;" type="text" id="content" name="content" rows="4"
                                                    placeholder="وصف المشكلة" cols="50"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="modal-footer">
                                        <button type="button" onclick="performStore()" class="btn btn-primary">أنشاء
                                            تذكرة</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
