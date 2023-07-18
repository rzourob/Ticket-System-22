<div class="tab-pane fade" id="profile-07" role="tabpanel" aria-labelledby="profile-07-tab">

    @foreach ($deviceMovements as $deviceMovement)
        <div class="card mt-3">
            <h5 class="card-header" style="font-family: 'Cairo', sans-serif">
                {{ $deviceMovement->title }}

                <span class="badge rounded-pill bg-warning text-dark">
                    {{ $deviceMovement->created_by }}
                </span>

            </h5>

            <div class="card-body">
                <div class="card-text">
                    <div class="float-start">
                        {{ $deviceMovement->body }}
                    </div>
                    <br>

                    <small>أخرتحديث - {{ $deviceMovement->updated_at->diffForHumans() }}
                    </small>

                    <div class="modal-footer" class="d-flex justify-center align-center">



                        @if ($deviceMovement->created_by === Auth::user()->name)

                        <a  href="{{ route('admin.Movements_it.edit', $deviceMovement->id) }}" class="btn btn-success left justify-center">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                            تعديل الرد
                        </a>


                         <a href="#"
                        onclick="performDestroy({{ $deviceMovement->id }},this)  "
                        class="btn btn-danger">حذف
                        <i class="fa fa-trash"></i>
                    </a>
                        @endif
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>


        </div>
    @endforeach

</div>

@section('js')


    <script>
        function performDestroy(id, ref) {
            confirmDestroy('/admin/Movements_It/destroy/' + id, ref);

        }
    </script>
@endsection

