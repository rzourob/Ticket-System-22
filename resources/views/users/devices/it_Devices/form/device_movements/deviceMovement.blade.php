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

                    <div class="clearfix"></div>
                </div>
            </div>

        </div>
    @endforeach
</div>
