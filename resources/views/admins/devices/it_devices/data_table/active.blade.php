{{-- {{$department->active}} --}}

@if ($device ->active)
<span class="btn btn-success">{{ $device->activity}}</span>
@else                           
<span class="btn btn-danger">{{ $device->activity}}</span>
@endif



