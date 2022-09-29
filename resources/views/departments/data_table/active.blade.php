
@if ($department ->active)
<span class="btn btn-success">{{ $department->activity}}</span>
@else                           
<span class="btn btn-danger">{{ $department->activity}}</span>
@endif