


@if ($subdepartment ->active)
<span class="btn btn-success">{{ $subdepartment->activity}}</span>
@else                           
<span class="btn btn-danger">{{ $subdepartment->activity}}</span>
@endif