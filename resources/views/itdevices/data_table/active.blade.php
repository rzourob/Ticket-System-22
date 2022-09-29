{{-- {{$department->active}} --}}

@if ($department ->active)
<span class="badge bg-success">{{ $department->activity}}</span>
@else                           
<span class="badge bg-danger">{{ $department->activity}}</span>
@endif
