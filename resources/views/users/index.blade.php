@extends('layouts.master')
@section('css')

@section('title')
    عرض المستخدمين
@stop
@endsection
<!-- breadcrumb -->
@section('PageTitle')
<!-- breadcrumb -->

@section('PageTitle2')
    عرض المستخدمين
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-2">
        <tbody>
            <tr>
                <td>
                    <a href="{{ route('users.create') }}" class="btn btn-block btn-outline-success btn-lg  ">أضافة
                        مستخدم</a>
                </td>
            </tr>
        </tbody>

    </div>
</div>
<br>

<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>الاسم المسخدم</th>
                                <th>البريد الاكتروني</th>
                                {{-- <th>نوع المستخدم </th> --}}
                                <th>حاله المستخدم</th>
                                <th>تاريخ أضافة </th>
                                <th>تاريخ أخر تحديث </th>
                                <th>الاعدادات</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $i = 0; ?>
                            @foreach ($users as $user)
                                <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>

                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    {{-- <td>{{ $user->role->name }}</td> --}}
                                    <td>
                                        @if ($user->status == 'مفعل')
                                            <span class="badge ">
                                                <div class="dot-label bg-success ml-1"></div>{{ $user->status }}
                                            </span>
                                        @else
                                            <span class="badge ">
                                                <div class="dot-label bg-danger ml-1"></div>{{ $user->status }}
                                            </span>
                                        @endif
                                    </td>

                                    <td>{{ $user->created_at }}</td>
                                    <td>{{ $user->updated_at }}</td>
                                    {{-- <td>
                              <div class="btn-group">
                                  <a href="{{ route('users.edit',$user->id) }}" class="btn btn-info">
                                      <i class="fa fa-edit"></i>
                                  </a>

                                  <a href="#" onclick="performDestroy({{ $user->id }},this)  " class="btn btn-danger">
                                      <i class="fa fa-trash"></i>
                                  </a>
                                  </a>            
                              </div>
                          </td> --}}

                                    <td>

                                        <div class="btn-group mb-1 ">
                                            <button type="button" class="btn btn-success dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                _msthash="3150394" _msttexthash="95992"
                                                style="direction: ltr;">الأجراءات</button>
                                            <div class="dropdown-menu" x-placement="bottom-start"
                                                style="position: absolute; transform: translate3d(0px, 33px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                <a class="dropdown-item"
                                                    href="{{ route('users.edit', $user->id) }}">تعديل بيانات</a>
                                                <a class="dropdown-item" href="#"
                                                    onclick="performDestroy({{ $user->id }},this)  "
                                                    class="btn btn-danger">حذف قسم</a>
                                            </div>
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

<!-- row closed -->
@endsection
@section('js')
<script>
    function performDestroy(id, ref) {
        confirmDestroy('/admin/users/' + id, ref);

    }
</script>
@endsection
