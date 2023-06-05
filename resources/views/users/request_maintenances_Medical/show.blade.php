@extends('layouts.master')
@section('css')

@section('title')
    تفاصيل التذكرة
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle2')
    تفاصيل التذكرة
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <form>
                    <h4 style="font-family: 'Cairo', sans-serif; color: #8d183d;"> تفاصيل التذكرة </h4>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">


        <div class="card mt-3">
            <h5 class="card-header"  style="font-family: 'Cairo', sans-serif ;line-height: 1.5 ;color: #8d183d ;width=2px; ">
                @if ($maintenancerequests->status === 'Todo')
                    {{ $maintenancerequests->title }}
                @else
                    {{-- <del>{{ $maintenancerequests->title }}</del> --}}
                    {{ $maintenancerequests->title }}
                @endif

                <span class="badge rounded-pill bg-warning text-dark">
                    {{ $maintenancerequests->Created_by }}
                </span>

                <span class="badge rounded-pill bg-warning text-dark">
                    {{ $maintenancerequests->created_at->diffForHumans() }}
                </span>
            </h5>

            <div class="card-body">
                <div class="card-text">
                    <div class="float-start">
                        @if ($maintenancerequests->status === 'Todo')
                            {{ $maintenancerequests->content }}

                            {{-- {{ $maintenancerequests->comment->body }} --}}
                        @else
                            {{-- <del>{{ $maintenancerequests->content }}</del> --}}
                            {{ $maintenancerequests->content }}

                            {{-- <del>{{ $maintenancerequests->comment->body }}</del> --}}
                        @endif
                        <br>

                        @if ($maintenancerequests->status === 'Todo')
                            <span class="badge rounded-pill bg-info text-dark">
                                Todo
                            </span>
                        @else
                            <span class="badge rounded-pill bg-success text-white">
                                Done
                            </span>
                        @endif


                        <small>أخرتحديث - {{ $maintenancerequests->updated_at->diffForHumans() }} </small>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

       

        @foreach ($comments as $comment)
            <div class="card mt-3">
                <h5 class="card-header"  style="font-family: 'Cairo', sans-serif ;line-height: 1.5 ;color: #8d183d;width=2px ">
                    @if ($comment->new_status === 'Todo')
                        {{ $comment->maintenancerequest->title }}
                    @else
                        {{-- <del>{{ $comment->maintenancerequest->title }}</del> --}}
                        {{ $comment->maintenancerequest->title }}
                    @endif

                    <span class="badge rounded-pill bg-warning text-dark">
                        {{ $comment->Created_by }}
                    </span>

                    <span>
                        @if ($comment->new_status === 'Todo')
                            <span class="badge rounded-pill bg-info text-dark">
                                Todo
                            </span>
                        @else
                            <span class="badge rounded-pill bg-success text-white">
                                Done
                            </span>
                        @endif
                    </span>
                </h5>

                <div class="card-body">
                    <div class="card-text">
                        <div class="float-start">
                            @if ($comment->new_status === 'Todo')
                                {{ $comment->body }}
                            @else
                                {{-- <del>{{ $comment->body }}</del> --}}
                                {{ $comment->body }}
                            @endif

                        </div>
                        <br>


                        {{-- @if ($comment->new_status === 'Todo')
                    <span class="badge rounded-pill bg-info text-dark">
                        Todo
                    </span>
                @else
                    <span class="badge rounded-pill bg-success text-white">
                        Done
                    </span>
                @endif --}}

                        <small>أخرتحديث - {{ $comment->updated_at->diffForHumans() }} </small>

                        {{-- @if (!Auth::user()->id == $comment->id)
                        @else --}}

                        {{-- <hr  style="font-family: 'Cairo', sans-serif ;line-height: 1.5 ;background-color: #8d183d;width=2px "> --}}
                        <div class="modal-footer" class="d-flex justify-center align-center">



                            @if( $comment->Created_by  === Auth::user()->name)

                            <a  href="#" class="btn btn-success left justify-center">
                                تعديل الرد</i>
                            </a>


                            <a href="#" onclick="performDestroy({{ $comment->id }},this)  "
                                class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i>
                                حذف الرد</a>
                                
                                @endif




                        </div>



                        {{-- @endif --}}


                        <div class="clearfix"></div>
                    </div>
                </div>
                {{-- <h5 class="card-header">
        @if ($comment->new_status === 'Todo')
            <span class="badge rounded-pill bg-info text-dark">
                Todo
            </span>
        @else
            <span class="badge rounded-pill bg-success text-white">
                Done
            </span>
        @endif
        
        <small>أخرتحديث - {{ $comment->updated_at->diffForHumans() }} </small>
    </h5> --}}
            </div>
        @endforeach

    </div>

</div>



<!-- row closed -->
@endsection
@section('js')

<script>
    function performDestroy(id, ref) {
        confirmDestroy('/Request/maintenances/' + id, ref);

    }
</script>

@endsection
